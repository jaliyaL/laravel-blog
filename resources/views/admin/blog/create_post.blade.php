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
 <form action='{{ route('admin.blog.post.create') }}' method='post'>
   Title:<br>
   <input type="text" name="title" id="title" value="{{ Request::old('title') }}"><br>
   Author:<br>
   <input type="text" name="author" id="author" {{ $errors->has('author') ? 'class=has-errors':'' }} value="{{ Auth::user()->first_name }}">
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
     <textarea name="body" id="body" class="form-control" rows="12" required="required" {{ $errors->has('body') ? 'class=has-errors':'' }} value="{{ Request::old('body') }}"></textarea>
   </div>
   <button type="submit" class="btn btn-default">Create Post</button>
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
 </form>
  </div>
</div>
@endsection

@section('scripts')
 <script type="text/javascript" src="{{ URL::to('src/js/post.js') }}"></script>
@endsection