<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
//use Illuminate\Http\Request;
	
class CategoryController extends Controller
{
    public function getCategoryIndex(){
    	$categories = Category::orderBy('created_at','desc')->paginate(5);
    	return view('admin.blog.categories',['categories'=>$categories]);
    }

    public function postCreateCategory(Request $request){

    	$this->validate($request,[
    		'name' => 'required|unique:categories'
    	]);
    	$category = new Category();
    	$category->name = $request['name'];
    	$category->save();
    }

    public function getDeleteCategory($category_id){
    	$category = Category::find($category_id);
        $category->delete();
        return response()->json(['message'=>'deleted successfully']); 
    }

    public function postEditCategory(Request $request){
        $this->validate($request,[
            'category' => 'required'
        ]);
        $category = Category::find($request['cat_id']);
        $category->name = $request['category'];
        $category->update();
        return response()->json(['new_body'=>$category->name]); 
    }
   }
