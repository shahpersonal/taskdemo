<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    //
    public function addCategory(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            $category =new Category;
            $category->name = $data['cat_name'];
            $category->name_arb = $data['cat_name_arb'];
            $category->url = $data['url'];
            $category->description = $data['description'];
            $category->save();
            return redirect('/admin/view_category')->with('flash_message_success','Category Added Successfully');
        }
        return view('admin.category.add_category');
    }
    public function editCategory(Request $request,$id = null)
    {

        if($request->isMethod('post')){
            $data = $request->all();

            $category =new Category;
            $category->name = $data['cat_name'];
            $category->name_arb = $data['cat_name_arb'];
            $category->url = $data['url'];
            $category->description = $data['description'];
            $category->save();
            return redirect('/admin/view_category')->with('flash_message_success','Category Added Successfully');
        }
        $categoryDetails = Category::where('id',$id)->first();

        return view('admin.category.edit_category',compact('categoryDetails'));
    }
    public function viewCategory()
    {

        $categories  = Category::get();
        return view('admin.category.view_category',compact('categories'));
    }
}
