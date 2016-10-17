@extends('layouts.master')

@section('title')
  Blog Home
@endsection

@section('content')
<div class="portlet-body center col-md-6">
  @foreach($posts as $post)
  <h4>{{ $post->title }}</h4>
  {{ $post->body }}<br />
  <h6><i>Created by {{ $post->author }} | {{ $post->created_at }}</i> <a href="{{ route('blog.single',['post_id'=>$post->id,'end'=>'frontend']) }}">Read more</a></h6>
  <br />
  @endforeach
  <ul class="pager">
    {{ $posts->links() }}
  </ul>
</div>

@endsection
