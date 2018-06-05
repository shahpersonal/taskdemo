<?php

namespace App\Http\Controllers;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Support\Facades\Hash;
use App\Customer;
use App\Role;
class CustomersController extends Controller
{
    //
    use Notifiable;
    use EntrustUserTrait;
    public function addCustomer(Request $request)
    {

        if($request->isMethod('post')){
            $data = $request->all();

//            $customer =new Category;
//            $customer->name = $data['first_name'].' '. $data['last_name'];
//            $customer->first_name = $data['first_name'];
//            $customer->last_name = $data['last_name'];
//            $customer->email = $data['email'];
//            $customer->phone = $data['phone'];
//            $customer->password = bcrypt($data['password']);
//            $customer->save();
            $customer =  Customer::create([
                'name' => $data['first_name']. ' '.$data['last_name'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
            ]);

            $customer->attachRole(Role::where('name','dataentry')->first());
           // return $customer;
            return redirect('/admin/view_customer')->with('flash_message_success','Customer Added Successfully');
        }
        return view('admin.customer.add_customer');
    }
//    public function editCategory(Request $request,$id = null)
//    {
//
//        if($request->isMethod('post')){
//            $data = $request->all();
//
//            $category =new Category;
//            $category->name = $data['cat_name'];
//            $category->name_arb = $data['cat_name_arb'];
//            $category->url = $data['url'];
//            $category->description = $data['description'];
//            $category->save();
//            return redirect('/admin/view_category')->with('flash_message_success','Category Added Successfully');
//        }
//        $categoryDetails = Category::where('id',$id)->first();
//
//        return view('admin.category.edit_category',compact('categoryDetails'));
//    }
    public function viewCustomer()
    {

        $customers  = Customer::get();
        return view('admin.customer.view_customer',compact('customers'));
    }
}
