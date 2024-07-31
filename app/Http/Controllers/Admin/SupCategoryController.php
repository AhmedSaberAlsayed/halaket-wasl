<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SupCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupCategoryRequest;
use App\Http\Requests\UpdateSupCategoryRequest;

class SupCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Sup_Categories= SupCategory::with('category')->get();
        return view("Sup_Categories.IndexSup_Category",compact("Sup_Categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::get();
        return view('Sup_Categories.CreateSup_Category',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupCategoryRequest $request)
    {
        SupCategory::create([
            'title'=> $request->title,
            'categoryID'=> $request->categoryID,

        ]);
        return redirect()->route("Sup_category.index")->with("success","تم اضافه العنوان الفرعي بنجاح");
    }

    /**
     * Display the specified resource.
     */
    public function show(SupCategory $supCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $Sup_Category = SupCategory::where('id',$request->Sup_category)->first();
        $categories=Category::get();
        return view('Sup_Categories.EditSup_Category',compact(['Sup_Category','categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupCategoryRequest $request, SupCategory $supCategory)
    {
        $SupCategory=SupCategory::where('id',$request->Sup_category)->first();
        $SupCategory->update([
            'title'=> $request->title,
            'categoryID'=> $request->categoryID,
        ]);
        return redirect()->route("Sup_category.index")->with("success","تم تعديل الخبر الفرعي بنجاح ");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $SupCategory_id )
    {
        $Category= SupCategory::find( $SupCategory_id );


     $Category->delete();
     session()->flash('done','Sup_category was deleted');
     return redirect()->route('Sup_category.index')->with("success","تم حذف العنوان الفرعي بنجاح");
    }
}
