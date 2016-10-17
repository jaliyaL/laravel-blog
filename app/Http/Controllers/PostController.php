<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function getBlogIndex()
    {
     // $posts = Post::orderBy('created_at','desc')->take(3)->get(); 
        $posts = Post::orderBy('created_at','desc')->paginate(3);
      foreach ($posts as $post) {
          $post->body = $this->shortenText($post->body,200);
      } 

      return view('frontend.blog.index',['posts' => $posts]);
    }

     public function getPostIndex()
    {
      $posts = Post::orderBy('created_at','desc')->paginate(4);
       foreach ($posts as $post) {
          $post->body = $this->shortenText($post->body,200);
      } 
      return view('admin.blog.index',['posts' => $posts]);
    }

    public function getSinglePost($post_id,$end = 'frontend')
    {
      $post = Post::find($post_id);  
      return view($end.'.blog.single',['post'=>$post]);
    }

    public function getCreatePost(){
    	return view('admin.blog.create_post');
    }

    public function postCreatePost(Request $request){
    	$this->validate($request, [
    		'title' => 'required|unique:posts|max:255',
    		'author' => 'required',
    		'body' => 'required',
    		]);

    	$post = new Post();
    	$post->title = $request['title'];
    	$post->author = $request['author'];
    	$post->body = $request['body'];
    	$post->save();

    	return redirect()->route('admin.index')->with(['success' => 'Post Success']);

    }

    private function shortenText($text,$length){
        if(strlen($text)>$length){
           $text = substr($text,0,$length).'...';
        }
        return $text;
        
    }

    //edit post 

    public function getEditPost($post_id){
        $post = Post::find($post_id);  
        return view('admin.blog.edit_post',['post'=>$post]);
    }

    public function postUpdatePost(Request $request){
        $this->validate($request, [
            'title' => 'required|max:255',
            'author' => 'required',
            'body' => 'required',
            ]);

        $post = Post::find($request['post_id']);
        $post->title = $request['title'];
        $post->author = $request['author'];
        $post->body = $request['body'];
        $post->update();

        return redirect()->route('admin.index')->with(['success' => 'Post updated']);

    }

    // delete post

    public function getDeletePost($post_id){
        $post = Post::find($post_id);
        if(Auth::user()->first_name != $post->author){
          return redirect()->back();
        }
        $post->delete();

        return redirect()->route('admin.index')->with(['success' => 'Post Deleted']);

    }
}
