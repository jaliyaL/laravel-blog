<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gallery;
use App\Http\Requests;
use Intervention\Image\Facades\Image;
use Auth;

class GalleryController extends Controller
{
    
    public function viewGalleryList()
    {
      $galleries = Gallery::all();	
      return view('admin.gallery.gallery',['galleries'=>$galleries]);
    }

    public function saveGallery(Request $request)
    {
        $this->validate($request,[
    		'gallery_name' => 'required|min:3|unique:gallery,name',
    	]);

    	$gallery = new Gallery();
    	$gallery->name = $request['gallery_name'];
    	$gallery->created_by = Auth::user()->id;
    	$gallery->published = 1;
    	$gallery->save();

    	return redirect()->back();
    }

    public function viewGalleryPics($id)
    {
    	$gallery = Gallery::findOrFail($id);
    	return view('admin.gallery.gallery-view',['gallery'=>$gallery]);
    }

    public function doImageUpload(Request $request)
    { 
        //get the file from the post request
        $file = $request->file('file');

        //set my file name
        $filename = uniqid().$file->getClientOriginalName();

        if(!file_exists('gallery/images')){
          mkdir('gallery/images',0777,true);
        }

        //move the file to the correct location
        $file->move('gallery/images',$filename);

        if(!file_exists('gallery/images/thumb')){
          mkdir('gallery/images/thumb',0777,true);
        }

        $thumb = Image::make('gallery/images/'.$filename)->resize(100, 75)->save('gallery/images/thumb/'.$filename,60);

        //save image details to the db
        $gallery = Gallery::find($request['gallery_id']);
        $image = $gallery->images()->create([
          'gallery_id' =>  $request['gallery_id'],
          'file_name' => $filename,
          'file_size' => $file->getClientSize(),
          'file_mime' => $file->getClientMimeType(),
          'file_path' => 'gallery/images/'.$filename,
          'created_by' => Auth::user()->id,
        ]);

        return $image;
    }

    public function deleteGallery($id)
    {
       $currentGallery = Gallery::findOrFail($id);  

       //$images =  $currentGallery->images();

       foreach ($currentGallery->images as $image) {
           unlink(public_path($image->file_path));
       }

       $currentGallery->images()->delete();

       $currentGallery->delete();
       return redirect()->back();
    }
}
