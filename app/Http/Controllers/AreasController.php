<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\City;
use App\Country;
class AreasController extends Controller
{
    //
    public function addArea(Request $request)
    {
        $countries =Country::get();
        // echo "<pre>";print_r($countries);die();
        if($request->isMethod('post')){
            $data = $request->all();
          //  echo "<pre>";print_r($data);die();
            $area =new Area;
            $area->ctID = $data['city_id'];
            $area->cntrID = $data['country_id'];
            $area->areaName = $data['area_name'];
            $area->areaName_arb = $data['area_name_arb'];
            $area->save();
            return redirect('/admin/view_area')->with('flash_message_success','Area Added Successfully');
        }
        $id=1;
       // $cities =City::get();
       // $cities = City::where('cntrID', '=', 1)->get();
         //echo "<pre>";print_r($cities);die();
        return view('admin.area.add_area',compact('countries'));
    }
    public function editArea(Request $request,$id = null)
    {

        $areaDetails =Area::where('id',$id)->first();

        //  $data = array('$countries' => $countries,
        //   'areaDetails' => $areaDetails);
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die();

            Area::where('id',$id)->update(['ctID'=>$data['city_id'],'cntrID'=>$data['country_id'],'areaName'=>$data['area_name'],'areaName_arb'=>$data['area_name_arb']]);
            return redirect('/admin/view_area')->with('flash_message_success','Area Edited Successfully');
        }
        $countries =Country::get();
        $countryId = $areaDetails['cntrID'];
        $cities = City::where(['cntrID'=>$countryId])->get();

        // $countries = Country::where(['status'=>2])->get();

        return view('admin.area.edit_area', compact('areaDetails','countries','cities'));
    }
    public function deleteArea(Request $request,$id = null)
    {
        if(!empty($id)) {
            Area::where('id',$id)->delete();
            return redirect('/admin/view_area')->with('flash_message_success', 'Area Deleted Successfully');
        }
    }
    public function viewArea()
    {
        $areas =Area::get();
        foreach($areas as $key => $val){
            $city_name = City::where(['id'=>$val->ctID])->first();
            $areas[$key]->city_name = $city_name->ctName;
        }
        //echo "<pre>";print_r($areas);die();
        return view('admin.area.view_area',compact('areas'));
    }
    public function getCity(Request $request)
    {
       $data =  $request->all();
        $countryId = $data['countryid'];
        $cities = City::where(['cntrID'=>$countryId])->get();

       // return view('admin.area.get_city',compact('cities'));
       return response()->json($cities);
    }
}
