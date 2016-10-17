@extends('layouts.admin-master')

@section('styles')
 <link rel="stylesheet" type="text/css" href="">
@endsection

@section('content')
<div class="container">
  @include('includes.info-box')

<div class="row">
  <form action="" method="POST" class="form-inline" role="form">
  <div class="form-group">
    <label class="" for="">Categories</label>
    <input type="text" name="category_name" id="category_name" class="form-control">
  </div>
  <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
  <button  class="btn btn-primary" id="create_category">Create Category</button>
</form>
</div>

<div class="row">
  @foreach($categories as $category)
   <div class="col-md-12">
     <div class="category-name">
       <p>{{ $category->name }}</p>
     </div>
     <div>
       <a class="edit_cat" href="{{ $category->id }}">edit</a> | <a class="delete_cat" href="{{ $category->id }}">delete</a>
     </div>
   </div>
  @endforeach
</div>
<br>
  
</div>

<!-- boostrap modal -->
<div class="modal fade" id="edit-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Post</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" role="form">
          <div class="form-group">
            <label for="category-name">Edit the category</label>
            <textarea id="category-name" name="category-name" id="input" class="form-control" rows="5" required="required"></textarea>
          </div>
          <input type="hidden" name="_token1" id="csrf-token" value="{{ Session::token() }}" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-category">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div> 
@endsection

@section('scripts')
<script type="text/javascript"> 
  //var token = '{{ Session::token() }}';
  //var url = '{{ route('edit') }}';
</script>
<script type="text/javascript" src="{{ URL::to('src/js/categories.js') }}"></script>
@endsection