@extends('layouts.master')

@section('title')
  Contact
@endsection

@section('style')
  
@endsection

@section('content')
 <div class="col-md-6 row center">
 <h1>Login</h1>
 <div class="form">
 	<form action="" method="POST" id="contact-form">
  <div class="form-group">
    <label for="name">Your Name</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
  </div>
  <div class="form-group">
    <label for="email">Your Email</label>
    <input type="text" name="email" class="form-control" id="email" placeholder="Your Email">
  </div> 
  <div class="form-group">
    <label for="msg">Your Message</label>
    <textarea name="msg" class="form-control" id="email" placeholder="Your Message"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
 </div>
</div>
@endsection