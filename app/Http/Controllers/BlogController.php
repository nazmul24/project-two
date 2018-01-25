<?php

namespace App\Http\Controllers;
use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class BlogController extends Controller
{
    public function showBlogForm(){
        $publishedCategories = Category::where('publication_status', 1)->get();
    	return view('admin.blog.add-blog', ['publishedCategories' => $publishedCategories]);
    }

    public function saveBlogInfo(Request $request){

        $this->validate($request, [
            'blog_title' => 'required|min:10|max:100'
        ]);

        //return $request->all();

        $blogImage = $request->file('blog_image');
        //dd($blogImage);
        $imageName = $blogImage->getClientOriginalName();
        $directory = 'blog-images/';
        $blogImage->move($directory, $imageName);

        //return 'Success';
        $imageUrl = $directory.$imageName;



    	$blog = new Blog();
    	$blog->blog_title = $request->blog_title;
    	$blog->category_id = $request->category_id;
    	$blog->author_name = Auth::user()->name;
    	$blog->blog_description = $request->blog_description;
        $blog->blog_image = $imageUrl;
    	$blog->publication_status = $request->publication_status;
    	$blog->save();

    	return redirect('/blog/add-blog')->with('message', 'Blog info save Sucessfully.');

    }

    public function manageBlogInfo(){
    	//$blogsInfo = Blog::orderBy('id', 'desc')->get();

        $blogsInfo = DB::table('blogs')
                ->join('categories', 'blogs.category_id', '=', 'categories.id')
                ->select('blogs.id', 'blogs.blog_title', 'categories.category_name', 'blogs.publication_status')
                ->get();

                //return $blogsInfo;

    	return view('admin.blog.manage-blog', ['blogsInfo' => $blogsInfo]);
    }

    public function viewBlogDetailsInfo($id){
    	//$viewBlog = Blog::find($id);
         $viewBlog = DB::table('blogs')
                ->join('categories', 'blogs.category_id', '=', 'categories.id')
                ->select('blogs.id', 'blogs.blog_title', 'categories.category_name', 'blogs.author_name', 'blogs.blog_description', 'blogs.blog_image', 'blogs.publication_status', 'blogs.created_at')
                ->first();
       

    	return view('admin.blog.view-blog-details', ['viewBlog' => $viewBlog]);
    }

    public function unpublishedBlogInfo($id){
    	//return $id;
    	$blogById = Blog::find($id);
    	$blogById->publication_status = 0;
    	$blogById->save();

    	return redirect('/blog/manage-blog')->with('message', 'Blog info unpublished Successfully.');
    }

    public function publishedBlogInfo($id){
    	//return $id;
    	$blogById = Blog::find($id);
    	$blogById->publication_status = 1;
    	$blogById->save();

    	return redirect('/blog/manage-blog')->with('message', 'Blog info published Successfully.');
    }

    public function editBlogInfo($id){
    	$blog = Blog::find($id);
    	//return $blog;

    	return view('admin.blog.edit-blog', ['blog' => $blog]);
    }

    public function updateBlogInfo(Request $request){
    	//return $request->all();
    	
    	$blogById = Blog::find($request->blog_id);
    	$blogById->blog_title = $request->blog_title;
    	$blogById->category_id = $request->category_id;
    	$blogById->author_name = Auth::user()->name;
    	$blogById->blog_description = $request->blog_description;
    	$blogById->publication_status = $request->publication_status;
    	$blogById->save();

    	return redirect('/blog/manage-blog')->with('message', 'Blog info update Successfully.');
    }

    public function deleteBlogInfo($id){
    	$blogById = Blog::find($id);
    	$blogById->delete();

    	return redirect('/blog/manage-blog')->with('message', 'Blog info delete Successfully.');
    }


}
