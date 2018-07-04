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
            $category-> parent_id  = 0;
            $category-> status  = 2;
            $category->description = $data['description'];
            $category->parent_id = $data['level'];
            $category->save();
            return redirect('/admin/view_category')->with('flash_message_success','Category Added Successfully');
        }
        $levels = Category::where('parent_id',0)->get();

        return view('admin.category.add_category',compact('levels'));
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
            $category->parent_id = $data['level'];
          //  $category-> parent_id  = 0;
           // $category-> status  = 2;
            Category::where('id',$id)->update(['name'=>$data['cat_name'],'name_arb'=>$data['cat_name_arb'],'url'=>$data['url'],'description'=>$data['description']]);

            return redirect('/admin/view_category')->with('flash_message_success','Category Updated Successfully');
        }
        $categoryDetails = Category::where('id',$id)->first();
       // dd($categoryDetails);
        $levels = Category::where('parent_id',0)->get();

        return view('admin.category.edit_category',compact('categoryDetails','levels'));
    }
    public function deleteCategory(Request $request,$id = null)
    {
        if(!empty($id)) {
            Category::where('id',$id)->delete();
            return redirect('/admin/view_category')->with('flash_message_success', 'Category Deleted Successfully');
        }
    }
    public function viewCategory()
    {

        $categories  = Category::get();
        foreach($categories as $key => $val){
            if($val->parent_id != 0) {
                $catarray = Category::where(['id' => $val->parent_id])->first();
               // dd($catarray);
                $categories[$key]->parent_name = $catarray->name;
            }

        }
        return view('admin.category.view_category',compact('categories'));
    }
}
