<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use Illuminate\Support\Facades\Auth;
class CountryController extends Controller
{
    //
    public function addCountry(Request $request)
    {
        if($request->isMethod('post')){
           $data = $request->all();

           $country =new Country;
           $country->name = $data['cnt_name'];
            $country->name_arb = $data['cnt_name_arb'];
            $country->currency = $data['currency'];
            $country->save();
            return redirect('/admin/view_country')->with('flash_message_success','Country Added Successfully');
        }
        return view('admin.country.add_country');
    }
    public function editCountry(Request $request,$id = null)
    {
        $countryDetails =Country::where('id',$id)->first();

        if($request->isMethod('post')){
            $data = $request->all();


            Country::where('id',$id)->update(['name'=>$data['cnt_name'],'name_arb'=>$data['cnt_name_arb'],'currency'=>$data['currency']]);
            return redirect('/admin/view_country')->with('flash_message_success','Country Edited Successfully');
        }

        return view('admin.country.edit_country',compact('countryDetails',$countryDetails));
    }
    public function deleteCountry(Request $request,$id = null)
    {
        if(!empty($id)) {
            Country::where('id',$id)->delete();
            return redirect('/admin/view_country')->with('flash_message_success', 'Country Deleted Successfully');
        }
    }
    public function viewCountry()
    {
        $userid = Auth::id();

       // if($project->user_id == Auth::user()->id)

        $countries =Country::get();
        return view('admin.country.view_country',compact('countries','userid'));
    }
}
