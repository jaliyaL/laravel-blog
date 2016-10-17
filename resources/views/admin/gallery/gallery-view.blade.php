@extends('layouts.admin-master')

@section('styles')
<!-- test commit -->
@endsection

@section('content')
<div class="container">
  @include('includes.info-box')
  <div class="row">
    <div class="col-md-8">
     <h1>{{ $gallery->name }}</h1>
   </div>  
   <div id="gallery" class="col-md-10">
     <div class="gallery-image" class="col-md-10">
      @foreach($gallery->images as $image)
      <a href="{{ url('/gallery/images/'.$image->file_name) }}" data-lightbox="{{ $gallery->name }}">
        <img src="{{ url('/gallery/images/thumb/'.$image->file_name) }}">
      </a>     
     @endforeach  
   </div>    
 </div>    
</div>
<br />
    <div class="row">
      <div class="col-md-10">
        <form action="{{ route('gallery.do-upload') }}" class="dropzone" id="addimages">       
          {{ csrf_field() }}
          <input type="hidden" name="gallery_id" value="{{ $gallery->id}}"></input>
        </form>
      </div>
    </div><br>
   <div class="row">
     <div class="col-md-8">
       <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
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