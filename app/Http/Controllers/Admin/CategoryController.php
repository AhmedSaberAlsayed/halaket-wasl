<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= Category::get();
        return view("categories.IndexCategory",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.CreateCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create([
            'title'=> $request->title,

        ]);
        return redirect()->route("category.index")->with("success","تم اضافه العنوان الرئيسي بنجاح");
}


    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $category = Category::where('id',$request->category_id)->first();
        return view('categories.EditCategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category=Category::where('id',$request->category_id)->first();


        $category->update([
            'title'=> $request->title,
        ]);
        return redirect(route('category.index'))->with("success","تم تعديل العنوان الرئيسي بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category_id)
    {
        $Category= Category::find( $category_id );
     $Category->delete();
     session()->flash('done','note was deleted');
     return redirect()->route('category.index')->with("success","تم حذف العنوان الرئيسي بنجاح");
    }
}
