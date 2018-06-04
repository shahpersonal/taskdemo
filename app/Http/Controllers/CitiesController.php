<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Country;
class CitiesController extends Controller
{
    public function addCity(Request $request)
    {
        $countries =Country::get();
       // echo "<pre>";print_r($countries);die();
        if($request->isMethod('post')){
            $data = $request->all();

            $city =new City;
            $city->cntrID = $data['country_id'];
            $city->ctName = $data['city_name'];
            $city->ctName_arb = $data['city_name_arb'];

            $city->save();
            return redirect('/admin/view_city')->with('flash_message_success','City Added Successfully');
        }

        return view('admin.city.add_city',compact('countries',$countries));
    }
    public function editCity(Request $request,$id = null)
    {

        $cityDetails =City::where('id',$id)->first();

      //  $data = array('$countries' => $countries,
         //   'cityDetails' => $cityDetails);
        if($request->isMethod('post')){
            $data = $request->all();
           // echo "<pre>";print_r($data);die();

            City::where('id',$id)->update(['ctName'=>$data['city_name'],'ctName_arb'=>$data['city_name_arb'],'cntrID'=>$data['country_id']]);
            return redirect('/admin/view_city')->with('flash_message_success','City Edited Successfully');
        }
        $countries =Country::get();
       // $countries = Country::where(['status'=>2])->get();
       // echo "<pre>";print_r($cityDetails);die();
          return view('admin.city.edit_city', compact('cityDetails','countries'));
           }
    public function deleteCity(Request $request,$id = null)
    {
        if(!empty($id)) {
            City::where('id',$id)->delete();
            return redirect('/admin/view_city')->with('flash_message_success', 'City Deleted Successfully');
        }
    }
    public function viewCity()
    {
        $cities =City::get();
        $cities = json_decode(json_encode($cities));
        foreach($cities as $key => $val){
            $country_name = Country::where(['id'=>$val->cntrID])->first();
            $cities[$key]->country_name = $country_name->name;
        }
        return view('admin.city.view_city',compact('cities'));
    }
}
