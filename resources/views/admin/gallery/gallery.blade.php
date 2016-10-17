@extends('layouts.admin-master')

@section('styles')
 <link rel="stylesheet" type="text/css" href="">
@endsection

@section('content')
<div class="container">
 
<h1>My Gallery</h1>
<div class="row">
  <div class="col-md-4">
  
    <table class="table table-striped table-hover">
      <thead>
      <tr class="info">
          <th>Gallery Name</th>
          <th>view</th>
        </tr>
      </thead>
      <tbody>  
        @foreach($galleries as $gallery) 
        <tr>
          <td>{{ $gallery->name }} <span class="pull-right">({{ $gallery->images()->count() }})</span></td>
          <td>
            <a href="{{ route('gallery.pics',['id'=>$gallery->id]) }}">view</a>/
            <a href="{{ route('gallery.delete',['id'=>$gallery->id]) }}">delete</a>
          </td>
        </tr>
        @endforeach  
      </tbody>
    </table>

  </div>
</div>

<div class="row">
  <div class="col-md-4">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form action="{{ route('gallery.save') }}" method="POST" class="form-inline" role="form">
     <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
     <div class="form-group">
      <input type="text" name="gallery_name" id="gallery_name" class="form-control">
    </div>
    <div class="form-group">
      <button  class="btn btn-primary" id="">Save</button>
    </div>
  </form>
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