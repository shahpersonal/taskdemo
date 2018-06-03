<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    //
    public function login(Request $request)
    {
       if($request->isMethod('post')){
           $data = $request->input();
           if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]))
           {

               //Session::put('adminSession',$data['email']);
              return redirect('admin/dashboard');
           }
           else
           {

              return redirect('admin')->with('flash_message_error','Invalid Username or Password');
           }
       }
      return view('admin.admin_login');
    }
    public function register(Request $request)
    {
      return view('admin.admin_register');
    }
    public function dashboard()
    {
        $user = User::where('id','<>',1)->get();
        $usercount= count($user);
        return view('admin.dashboard',compact('usercount'));
//        if(Session::has('adminSession')) {
//            return view('admin.dashboard');
//        }
//        else
//        {
//            return redirect('/admin')->with('flash_message_error','Please login to access');
//        }
    }
    public function settings()
    {
        return view('admin.settings');
    }
    public function updateProfile(Request $request)
    {
        $id= Auth::User()->id;
        if($request->isMethod('post')){
         $data = $request->all();

         User::where('id',$id)->update(['first_name'=>$data['first_name'],'last_name'=>$data['last_name'],'email'=>$data['email'],'phone'=>$data['phone']])  ;
         return back()->with('flash_message_success','Profile Updated Successfully');
        }
      $userDetail = User::where('id',$id)->get()->first();

      //echo "<pre>";print_r($userDetail);die();
        return view('admin.profile',compact('userDetail'));
    }
    public function chkPassword(Request $request)
    {
     $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['admin'=>'1'])->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }
    public function updatePassword(Request $request)
    {
        $data = $request->all();
        $check_password =User::where(['email'=>Auth::user()->email])->first();
        $current_password = $data['current_pwd'];
        if(Hash::check($current_password,$check_password->password)){
            $new_password = bcrypt($data['new_pwd']);
            User::where('id','1')->update(['password'=>$new_password]);
            return redirect('/admin/settings')->with('flash_message_success','Password Updated Successfully');
        }
        else
        {
            return redirect('/admin/settings')->with('flash_message_error','Incorrect current Password');
        }

    }
    public function logout()
    {
        Session::flush();
        return redirect('admin')->with('flash_message_success','Logged Out Successfully');
    }
}
