<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {
   
    Route::get('/',[
     'as' => 'blog.index',
     'uses' => 'PostController@getBlogIndex' 
    ]);

    Route::get('/blog',[
     'as' => 'blog.index',
     'uses' => 'PostController@getBlogIndex' 
    ]);

    Route::get('/blog/{post_id}&{end}',[
     'as' => 'blog.single',
     'uses' => 'PostController@getSinglePost'
    ]);

    Route::get('/about',function(){
        return view('frontend.other.about');
    })->name('about');

    Route::get('/contact',[
     'as' => 'contact',
     'uses' => 'ContactMessageController@getContactIndex'
    ]);

    Route::group(['prefix' => '/admin'], function () {
       
        /* 
        Route::get('/',[
           'as' => 'signin',
           'uses' => 'UserController@getSignIn'
        ]);

        Route::get('/',[
           'as' => 'admin.index',
           'uses' => 'AdminController@getIndex'
        ]); 
        */

        // admin sign in view
        Route::get('/signin', function () {
         return view('admin.signin');
        })->name('signin');
        
        // admin sign up view
        Route::get('/signup', function () {
         return view('admin.signup');
        })->name('signup');

        // admin sign up post
        Route::post('/signup',[
           'as' => 'signup.post',
           'uses' => 'UserController@postSignUp'
        ]);

        // admin sign in post
        Route::post('/signin',[
           'as' => 'signin.post',
           'uses' => 'UserController@postSignIn'
        ]);

        Route::get('/logout',[
           'as' => 'logout',
           'uses' => 'UserController@getLogout'
        ]);
        
        ///////////////// Auth Route  ////////////////////

        Route::group(['middleware' => 'auth'], function () {      
          // admin dashboard
          Route::get('/dashboard',[
           'as' => 'admin.index',
           'uses' => 'AdminController@getIndex'     
           ]); 

          
          ///////////////  Post Routes  ///////////////
        
          Route::get('/blog/posts/create',[
           'as' => 'admin.blog.create_post',
           'uses' => 'PostController@getCreatePost'
           ]);

          Route::post('/blog/posts/create',[
           'as' => 'admin.blog.post.create',
           'uses' => 'PostController@postCreatePost'
           ]);

          Route::get('/blog/posts',[
           'as' => 'admin.blog.index',
           'uses' => 'PostController@getPostIndex'
           ]);

          Route::get('/blog/post/{post_id}&{end}',[
           'as' => 'admin.blog.post',
           'uses' => 'PostController@getSinglePost'
           ]);

          //update post routes
          Route::get('/blog/posts/{post_id}/edit',[
           'as' => 'admin.blog.edit.post',
           'uses' => 'PostController@getEditPost'
           ]);

          Route::post('/blog/post/update',[
           'as' => 'admin.blog.post.update',
           'uses' => 'PostController@postUpdatePost'
           ]);

          //delete post routes
          Route::get('/blog/posts/{post_id}/delete',[
           'as' => 'admin.blog.delete.post',
           'uses' => 'PostController@getDeletePost'
           ]);

        /////////////  Categories Routes  ///////////
     
        Route::get('/blog/categories',[
         'as' => 'admin.blog.categories',
         'uses' => 'CategoryController@getCategoryIndex'
         ]);

        Route::post('/blog/category/create',[
         'as' => 'admin.blog.category.create',
         'uses' => 'CategoryController@postCreateCategory'
         ]);

        Route::get('/blog/category/{category_id}/delete',[
         'as' => 'admin.blog.category.delete',
         'uses' => 'CategoryController@getDeleteCategory'
         ]);

         //edit category

         /*
         Route::post('/blog/category/edit',function(\Illuminate\Http\Request $request){
            return response()->json(['message'=>$request['cat_id']]);
         })->name('edit');
         */

        Route::post('/blog/category/edit',[
         'as' => 'edit',
         'uses' => 'CategoryController@postEditCategory'
        ]);

        ////////////// User Profile //////////

        Route::get('/account', function () {
         return view('admin.account');
        })->name('account');

        Route::get('/account',[
         'as' => 'account',
         'uses' => 'UserController@getAccount'
        ]);

        Route::post('/updateaccount',[
         'as' => 'account.save',
         'uses' => 'UserController@postAccountSave'
        ]);

        Route::get('/userimage/{filename}',[
         'as' => 'account.image',
         'uses' => 'UserController@getUserImage'
        ]);

        ///////////// Gallery Routes ////////////////

        Route::get('/gallery/list',[
         'as' => 'gallery.view',
         'uses' => 'GalleryController@viewGalleryList'
        ]);

        Route::post('/gallery/save',[
         'as' => 'gallery.save',
         'uses' => 'GalleryController@saveGallery'
        ]);

        Route::get('/gallery/view/{id}',[
         'as' => 'gallery.pics',
         'uses' => 'GalleryController@viewGalleryPics'
        ]);

        Route::post('/image/do-upload',[
         'as' => 'gallery.do-upload',
         'uses' => 'GalleryController@doImageUpload'
        ]);

        Route::get('/gallery/delete/{id}',[
         'as' => 'gallery.delete',
         'uses' => 'GalleryController@deleteGallery'
        ]);



     });

    });
});
