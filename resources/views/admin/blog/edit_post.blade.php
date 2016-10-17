@extends('layouts.admin-master')

@section('styles')
 <link rel="stylesheet" type="text/css" href="">
@endsection

@section('content')
   
<div class="row">
  <div class="col-md-12  margin-bottom-30">
    <div class="container6">
      @include('includes.info-box')
    </div>
    <form action='{{ route('admin.blog.post.update') }}' method='post'>
     Title:<br>
     <input type="text" name="title" id="title" value="{{ Request::old('title') ? Request::old('title') : isset($post) ? $post->title : '' }}"><br>
     Author:<br>
     <input type="text" name="author" id="author" {{ $errors->has('author') ? 'class=has-errors':'' }} value="{{ Request::old('author') ? Request::old('author') : isset($post) ? $post->author : '' }}">
     Add Categories:<br>
     <select name="category_select" id="category_select">
       <option value="dummy">dummy</option>     
     </select>
     <button type="button" class="btn btn-default">Add Category</button>
     <div class="add_categories">
       <ul></ul>
     </div>
     <input type="hidden" name="categories" id="categories" class="form-control" value="">
     <div class="form-group">
       <label for="body">Body</label>
       <textarea name="body" id="body" class="form-control" rows="12" required="required" {{ $errors->has('body') ? 'class=has-errors':'' }}> {{ Request::old('body') ? Request::old('body') : isset($post) ? $post->body : '' }}</textarea>
     </div>

     <input type="hidden" name="post_id" value="{{ $post->id }}">
     <button type="submit" class="btn btn-default">Save Post</button>
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
   </form>
 </div>
</div>

@endsection

@section('scripts')
 <script type="text/javascript" src="{{ URL::to('src/js/post.js') }}"></script>
@endsection