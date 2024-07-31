<?php

namespace App\Http\Controllers\NewsPage;

use App\Models\News;
use App\Models\Category;
use App\Models\SupCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  Illuminate\Database\Eloquent\Builder;

class NewsWebSiteController extends Controller
{

    public function index()
    {
        $Categories=Category::with('SupCategory','News')->orderBy('created_at', 'DESC')->get();
        $News= News::with('Category','User','SupCategory')->orderBy('created_at', 'DESC')->paginate(16);
        $TheTopNews=News::with('Category','User','SupCategory')->take(10)->get();
        // dd($TheTopNews);
        // dd($Categories);

        return view("NewsPage.index",compact('Categories','News','TheTopNews'));
    }
    public function show(News $news)
    {


        $NewsInThisCategory= News::with('Category')->where('categoryID', $news->categoryID)->inRandomOrder()->limit(5)->get();
        $AnotherNewsInThisCategory= News::with('Category')->where('categoryID', $news->categoryID)->inRandomOrder()->limit(5)->get();
        $AllCategory=Category::with('News')->get();
        // $CountNews=Category::with('News')->count();
        // dd($CountNews);
        return view("NewsPage.single-page",compact('news','AllCategory','NewsInThisCategory','AnotherNewsInThisCategory'));


    }
    public function CategoryShow(Category $category)
    {

        // dd($category );
        // $TheCategory=Category::find($category);
        // $TheCategory=Category::all();
        // $TheCategory= Category::with('News','SupCategory')->where('id',$category->id )->get();
        // $ThePaginateCategory= Category::where('id',$category->id )->with('News','SupCategory')->get();
        $News= News::where('categoryID',$category->id )->paginate(16);
        $SupCategory=SupCategory::where('categoryID',$category->id )->with('News')->get();
        // dd($SupCategory);
        // لوب علي السب كاتجري عشان تطبع كل اخبارهم
        // $AnotherNewsInThisCategory= News::with('Category')->where('categoryID', $news->categoryID)->inRandomOrder()->limit(5)->get();
        // $AllCategory=Category::with('News')->get();
        // $CountNews=Category::with('News')->count();
        return view("NewsPage.Category",compact('category','News','SupCategory'));


    }


}
