@extends('admin.master')
@section('pageTitle')
    Add Blog
@endsection
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="well">
				@if($message = Session::get('message'))
				<h2 class="text-center text-success">{{ $message }}</h2>
				@endif
				<form class="form-horizontal" method="POST" action="{{ url('/blog/new-blog') }}" enctype="multipart/form-data">
					{{ csrf_field() }}					
					<div class="form-group">
						<label class="col-sm-3">Blog Title</label>
						<div class="col-sm-9">
							<input type="text" name="blog_title" class="form-control">
							<span class="text-danger">{{ $errors->has('blog_title') ? $errors->first('blog_title') : ' ' }}</span>
						</div>						
					</div>
					<div class="form-group">
						<label class="col-sm-3">Category Name</label>
						<div class="col-sm-9">
							<select name="category_id" class="form-control">
								<option>--- Select Category Name ---</option>
								@foreach($publishedCategories as $publishedCategory)
								<option value="{{ $publishedCategory->id }}">{{ $publishedCategory->category_name }}</option>
								@endforeach
							</select>
						</div>						
					</div>					
					<div class="form-group">
						<label class="col-sm-3">Blog Description</label>
						<div class="col-sm-9">
							<textarea name="blog_description" rows="8" class="form-control"></textarea>
						</div>						
					</div>
					<div class="form-group">
						<label class="col-sm-3">Blog Image</label>
						<div class="col-sm-9">
							<input type="file" name="blog_image" accept="image/*">
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
							<input type="submit" name="btn" class="btn btn-success btn-block" value="Save Blog Info">
						</div>						
					</div>
				</form>
			</div>
		</div>
		
	</div>
@endsection