@extends('admin.master')
@section('pageTitle')
    Edit Blog
@endsection
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="well">
				@if($message = Session::get('message'))
				<h2 class="text-center text-success">{{ $message }}</h2>
				@endif
				<form class="form-horizontal" name="editBlogForm" method="POST" action="{{ url('/blog/update-blog') }}">
					{{ csrf_field() }}					
					<div class="form-group">
						<label class="col-sm-3">Blog Title</label>
						<div class="col-sm-9">
							<input type="text" name="blog_title" value="{{ $blog->blog_title }}" class="form-control">
							<input type="hidden" name="blog_id" value="{{ $blog->id }}" class="form-control">
						</div>						
					</div>

					<div class="form-group">
						<label class="col-sm-3">Category Name</label>
						<div class="col-sm-9">
							<input type="text" name="category_name" value="{{ $blog->category_name }}" class="form-control">
						</div>						
					</div>
					<div class="form-group">
						<label class="col-sm-3">Author Name</label>
						<div class="col-sm-9">
							<input type="text" name="author_name" value="{{ $blog->author_name }}" class="form-control">
						</div>						
					</div>
					<div class="form-group">
						<label class="col-sm-3">Blog Description</label>
						<div class="col-sm-9">
							<textarea name="blog_description" rows="5" class="form-control">{{ $blog->blog_description }}</textarea>
						</div>						
					</div>
					<div class="form-group">
						<label class="col-sm-3">Blog Image</label>
						<div class="col-sm-9">
							<input type="file" name="blog_image" accept="image/*">
							<img src="{{ $blog->blog_image }}" alt="" width="120" height="80">
						</div>						
					</div>
					<div class="form-group">
						<label class="col-sm-3">Publication Status</label>
						<div class="col-sm-9">
							<select class="form-control" name="publication_status">
								<option>Select Publication Status</option>
								<option value="1">Published</option>
								<option value="0">Unpublished</option>
							</select>
						</div>						
					</div>
					<div class="form-group">
						<!-- <label class="col-sm-3"></label> -->
						<div class="col-sm-9 col-sm-offset-3">
							<input type="submit" name="btn" class="btn btn-success btn-block" value="Update Blog Info">
						</div>						
					</div>
				</form>
			</div>
		</div>
		
	</div>
	<script>
		document.forms['editBlogForm'].elements['publication_status'].value='{{ $blog->publication_status }}';
	</script>
@endsection