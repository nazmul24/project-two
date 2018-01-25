@extends('admin.master')
@section('pageTitle')
    Edit Category
@endsection
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="well">
				@if($message = Session::get('message'))
				<h2 class="text-center text-success">{{ $message }}</h2>
				@endif
				<form class="form-horizontal" name="editCategoryForm" method="POST" action="{{ url('/category/update-category') }}">
					{{ csrf_field() }}					
					<div class="form-group">
						<label class="col-sm-3">Category Name</label>
						<div class="col-sm-9">
							<input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control">
							<input type="hidden" name="category_id" value="{{ $category->id }}" class="form-control">
						</div>						
					</div>
					<div class="form-group">
						<label class="col-sm-3">Category Description</label>
						<div class="col-sm-9">
							<textarea name="category_description" rows="5" class="form-control">{{ $category->category_description }}</textarea>
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
							<input type="submit" name="btn" class="btn btn-success btn-block" value="Update Category Info">
						</div>						
					</div>
				</form>
			</div>
		</div>
		
	</div>
	<script>
		document.forms['editCategoryForm'].elements['publication_status'].value='{{ $category->publication_status }}';
	</script>
@endsection