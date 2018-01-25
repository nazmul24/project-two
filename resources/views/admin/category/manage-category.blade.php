@extends('admin.master')
@section('pageTitle')
    Manage Category
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
						<th>Category Id</th>
						<th>Category Name</th>
						<th>Category Description</th>
						<th>Publication Status</th>
                        <th>Action</th>
					</tr>
					@foreach($categories as $category)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->category_name }}</td>
						<td>{{ $category->category_description }}</td>
						<td>{{ $category->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
						<td>
							@if($category->publication_status == 1)
                            <a href="{{ url('/category/unpublished-category/'.$category->id) }}" class="btn btn-success btn-xs" title="Published">
                                <span class="glyphicon glyphicon-arrow-up"></span>
                             </a>
                             @else
                            <a href="{{ url('/category/published-category/'.$category->id) }}" class="btn btn-warning btn-xs" title="Unpublished">
                                <span class="glyphicon glyphicon-arrow-down"></span>
                            </a>
                             @endif  
                            <a href="{{ url('/category/edit-category/'.$category->id) }}" class="btn btn-info btn-xs" title="Edit Category">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>   
                            <a href="{{ url('/category/delete-category/'.$category->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete This ?');">
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