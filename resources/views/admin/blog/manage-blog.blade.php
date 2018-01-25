@extends('admin.master')
@section('pageTitle')
    Manage Blog
@endsection
@section('content')
	@if($message = Session::get('message'))
	<h3 class="text-center text-success">{{ $message }}</h3>
	@endif
	<div class="row">
		<div class="col-sm-12">
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped">
					<tr class="info text-primary">
						<th>SL. No</th>
						<th>Blog Title</th>
						<th>Category Name</th>
						<th>Publication Status</th>
                        <th>Action</th>
					</tr>
					<?php $i = 1?>
					@foreach($blogsInfo as $blogInfo)
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{ $blogInfo->blog_title }}</td>
						<td>{{ $blogInfo->category_name }}</td>
						<!-- <td>{{ $blogInfo->publication_status == 1 ? 'Published' : 'Unpublished' }}</td> -->
						<td>
                            @if($blogInfo->publication_status == 1)
                            <span class="label label-success">Published</span>
                            @else
                            <span class="label label-warning">Unpublished</span>
                            @endif
                        </td>
						<td>
							<a target="_blank" href="{{ url('/blog/view-blog-details/'.$blogInfo->id) }}" class="btn btn-primary btn-xs" title="View Blog Details">
                                 <span class="glyphicon glyphicon-zoom-in"></span>
                            </a>
							@if($blogInfo->publication_status == 1)
                            <a href="{{ url('/blog/unpublished-blog/'.$blogInfo->id) }}" class="btn btn-success btn-xs" title="Published">
                                <span class="glyphicon glyphicon-arrow-up"></span>
                             </a>
                             @else
                            <a href="{{ url('/blog/published-blog/'.$blogInfo->id) }}" class="btn btn-warning btn-xs" title="Unpublished">
                                <span class="glyphicon glyphicon-arrow-down"></span>
                            </a>
                             @endif  
                            <a href="{{ url('/blog/edit-blog/'.$blogInfo->id) }}" class="btn btn-info btn-xs" title="Edit blog">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>   
                            <a href="{{ url('/blog/delete-blog/'.$blogInfo->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete This ?');">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>                                            
						</td>
					</tr>
					@endforeach
				</table>
				
			</div>			
		</div>		
	</div>
@endsection