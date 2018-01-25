<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
//use DB;

class CategoryController extends Controller
{

    public function showCategoryForm(){
    	return view('admin.category.add-category');

    }

    public function saveCategoryInfo(Request $request){
    	//return('Test');
    	//return $request->all();

    	//Eloquent ORM Process 01
    	$category = new Category();
    	$category->category_name = $request->category_name;
    	$category->category_description = $request->category_description;
    	$category->publication_status = $request->publication_status;
    	$category->save();

    	
    	//Eloquent ORM Process 02
    		//Category::create($request->all());
    	

    	//Query Builder Process
    	// DB::table('categories')->insert([
    	// 	'category_name' => $request->category_name,
    	// 	'category_description' => $request->category_description,
    	// 	'publication_status' => $request->publication_status
    	// ]);



    	return redirect('/category/add-category')->with('message', 'Category info save Successfully.');

    }

    public function manageCategoryInfo(){
    	//$categories = Category::all();
    	$categories = Category::orderBy('id', 'desc')->get();
    	return view('admin.category.manage-category', ['categories' => $categories]);
    }

    public function unpublishedCategoryInfo($id){
    	//return $id;
    	$categoryById = Category::find($id);
    	$categoryById->publication_status = 0;
    	$categoryById->save();

    	return redirect('/category/manage-category')->with('message', 'Category info unpublished Successfully.');
    }

    public function publishedCategoryInfo($id){
    	//return $id;
    	$categoryById = Category::find($id);
    	$categoryById->publication_status = 1;
    	$categoryById->save();

    	return redirect('/category/manage-category')->with('message', 'Category info published Successfully.');
    }

    public function editCategoryInfo($id){
    	$category = Category::find($id);
    	//return $category;

    	return view('admin.category.edit-category', ['category'=>$category]);
    }

    public function updateCategoryInfo(Request $request){
    	//return $request->all();
    	
    	$categoryById = Category::find($request->category_id);
    	$categoryById->category_name = $request->category_name;
    	$categoryById->category_description = $request->category_description;
    	$categoryById->publication_status = $request->publication_status;
    	$categoryById->save();

    	return redirect('/category/manage-category')->with('message', 'Category info update Successfully.');
    }

    public function deleteCategoryInfo($id){
    	$categoryById = Category::find($id);
    	$categoryById->delete();

    	return redirect('/category/manage-category')->with('message', 'Category info delete Successfully.');
    }







}
