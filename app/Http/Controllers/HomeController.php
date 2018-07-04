<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Intervention\Image\Facades\Image as Mimage;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        $allRoles = Role::get();
       // dd($allRoles);

        return view('home',compact('users','allRoles'));
    }
    public function addUserForm()
    {
        return view('admin.customer.add_customer');
    }
    public function addUser(UsersRequest $request)
    {

        if($request->isMethod('post'))
        {

            $data = $request->all();

            if($request['image'] != ''){

                $image_name = $this->uploadImage($request->file('image'));
              //  $driver->image =$image_name;
            }

            $user = User::create([
                'name' => $data['first_name'].' '.$data['last_name'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'image' => $image_name,
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
            ]);
            $user->attachRole(Role::where('name','data-entry')->first());
          //  return $user;
            return redirect('/home')->with('flash_message_success','User Added Successfully');


//            $data = $request->all();
//
//            $user =new User;
//            $user->name = $data['name'];
//            $user->email = $data['email'];
//            $user->password = $data['password'];
//             $user->save();
            $user->attachRole(Role::where('name','data-entry')->first());
        }

    }
    private function uploadImage($file){
        $extension = $file->getClientOriginalExtension();

        //$file_name = Carbon::now()->format('Y-m-d_H-i-s')."_".str_random(10).".".$extension;
        $file_name = Carbon::now()->format('Ymd_His')."_".str_random(10).".".$extension;


        $image = Mimage::make($file);
        $image->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save(public_path().'/uploads/users/'.$file_name);

        return $file_name;
    }
    public function editUser(Request $request,$id=null)
    {
        $user = User::find($id);
        if($request->isMethod('post')){
            $data = $request->all();

//            $user =new User;
//            $user->name = $data['name'];
//            $user->email = $data['email'];
//            $user->password = $data['password'];
            User::where('id',$id)->update(['name'=>$data['name'],'email'=>$data['email'],'password'=>$data['password']]);
           // $user->attachRole(Role::where('name','admin')->first());
            return redirect('/home')->with('flash_message_success','User Edited Successfully');
        }
      return view('admin.customer.edit_customer',compact('user'));
    }
    public function editUserRole(Request $request,$id=null)
    {
        $user = User::find($id);
        $allRoles = Role::get();
        if($request->isMethod('post')){
            $data = $request->all();
            $roles = $request->roles;
            DB::table('role_user')->where('user_id',$id)->delete();
            foreach($roles as $role)
            {
            $user->attachRole($role);
            }

            // $user->attachRole(Role::where('name','admin')->first());
            return redirect('/home')->with('flash_message_success','User Role Edited Successfully');
        }
    return view('edit_role',compact('user','allRoles'));
    }
}
