@extends('layouts.admin-master')

@section('styles')

@endsection

@section('content')
 <div class="content">
	<div class="container">			
		<div class="row">
			<div class="col-md-12  margin-bottom-30">
				<!-- BEGIN Portlet PORTLET-->
				<div class="portlet">
					<div class="portlet-title">
						<div class="actions">
							<a href="{{ route('admin.blog.create_post') }}" class="btn">
								<i class="glyphicon glyphicon-pencil"></i>
								New Posts
							</a>
							
						</div>
					</div>
					<div class="portlet-body">
                         <h4>{{ $post->title }}</h4>
                         {{ $post->body }}<br />
                        <h6><i>Created by {{ $post->author }} | {{ $post->created_at }}</i> <br><br />
                        
                         @if(Auth::user()->first_name == $post->author)
                            <i><a href="{{ route('admin.blog.edit.post',['post_id'=>$post->id]) }}">Edit</a> | <a href="{{ route('admin.blog.delete.post',['post_id'=>$post->id]) }}">Delete</a></i></h6><br>
                         @endif
     
					</div>
				</div>
				<!-- END Portlet PORTLET-->
			</div>
			</div>
</div>
</div>
@endsection

@section('footer')

@endsection