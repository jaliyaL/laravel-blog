<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;

class AdminController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        
       // $posts = Post::orderBy('created_at','desc')->take(3)->get();

        //echo "<pre>";
        //print_r($posts);
    	return view('admin.index',['posts' => $posts]);
    }
}
