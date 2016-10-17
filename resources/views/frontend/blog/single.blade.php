@extends('layouts.master')

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
                         <i><a href="">View Post</a> | <a href="">Edit</a> | <a href="">Delete</a></i></h6><br>
                      
     
					</div>
				</div>
				<!-- END Portlet PORTLET-->
			</div>
			</div>
</div>
</div>

<br>
<br>
<center>
<strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">KeenThemes</a></strong>
</center>
<br>
<br>
@endsection