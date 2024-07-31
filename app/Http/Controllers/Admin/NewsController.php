<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Category;
use App\Models\SupCategory;
use Illuminate\Http\Request;
use App\Http\Traits\ImagesTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;

class NewsController extends Controller
{
    use ImagesTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $News= News::with('SupCategory','Category','User')->get();
        // dd($News);
        return view("News.IndexNews",compact("News"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=$this->getcategories();
        return view('News.CreateNews',[
            'categories' => $categories,
        ]);
    }


    public function getCategories(){
        $Categories= Category::get();
        return $Categories;
    }

    public function getSup_Categories(Request $request){
        $SupCategories= SupCategory::where('categoryID',$request->category_id)->get();// categoryID

        return response()->json($SupCategories);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        $fileName= time() . '.' . $request->image_path->extension();
        $this->uploadimg($request->image_path, $fileName, 'Imag_Nwes');
        $createdBy= Auth::user()->id;
        News::create([
            'title'=> $request->title,
            'content'=> $request->content,
            'image_path'=> $fileName,
            'keyWords'=> $request->keyWords,
            'timeReading'=> $request->timeReading,
            'createdBy'=> $createdBy,
            'categoryID'=> $request->categoryID,
            'supCategoryID'=> $request->supCategoryID,
        ]);
        return redirect()->route("News.index")->with("success","تم اضافه الخبر بنجاح");
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $categories=Category::get();
        $Sup_categories=SupCategory::with('News')->get();
        $News = News::where('id',$request->News_id)->first();
        return view('News.EditNews',compact(['News','categories','Sup_categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request)
    {
        $News=News::where('id',$request->News_id)->first();
        $createdBy= Auth::user()->id;

        $fileName= time() . '.' . $request->image_path->extension();
        $this->uploadimg($request->image_path, $fileName, 'Imag_Nwes',$News->image_path);
        $News->update([
            'title'=> $request->title,
            'content'=> $request->content,
            'image_path'=> $fileName,
            'keyWords'=> $request->keyWords,
            'timeReading'=> $request->timeReading,
            'createdBy'=> $createdBy,
            'categoryID'=> $request->categoryID,
            'supCategoryID'=> $request->supCategoryID,

        ]);
        return redirect()->route("News.index")->with("success","تم تعديل الخبر بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($News_id )
    {
        $News= News::find( $News_id );
        unlink(public_path($News->image_path));
        $News->delete();
        session()->flash('done','News was deleted');
        return redirect()->route('News.index')->with("success","تم حذف الخبر بنجاح");
    }
}
