@extends('admin.master')
@section('pageTitle')
    View Blog Details
@endsection
@section('content')
<div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">                           
                            <tr>
                                <th>Blog Id</th>
                                <td>{{ $viewBlog->id }}</td>
                            </tr>
                            <tr>
                                <th>Blog Title</th>
                                <td>{{ $viewBlog->blog_title }}</td>
                            </tr>
                            <tr>
                                <th>Category Name</th>
                                <td>{{ $viewBlog->category_name }}</td>
                            </tr>                            
                            <tr>
                                <th>Author Name</th>
                                <td>{{ $viewBlog->author_name }}</td>
                            </tr>
                            <tr>
                                <th>Blog Description</th>
                                <td>{{ $viewBlog->blog_description }}</td>
                            </tr>
                            <tr>
                                <th>Blog Image</th>
                                <td><img src="{{ asset($viewBlog->blog_image) }}" alt="" width="180px" height="120px"></td>
                            </tr>
                            <tr>
                                <th>Publication Status</th>
                                <td>{{ $viewBlog->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                            </tr>
                            <tr>
                                <th>Published Date -Time</th>
                                <td>{{ $viewBlog->created_at }}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
@endsection