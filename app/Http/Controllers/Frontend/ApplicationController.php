<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Http\Request;
use function Webmozart\Assert\Tests\StaticAnalysis\email;

class ApplicationController extends Controller
{

    public function index()
    {
        $categoryData = Category::all();
        return view('welcome', compact('categoryData'));
    }

    public function news(Request $request)
    {
        if (!empty($request->criteria)) {
            $newsData = News::where('slug', '=', $request->criteria)->first();
            $cid = $newsData->getCategory->id;
            $categoryNews = News::where('category_id', '=', $cid)->get();
            return view('news-details', compact('newsData', 'categoryNews'));
        }

        $newsData = News::all();
        return view('news', compact('newsData'));
    }

    public function login()
    {

    }

    public function logout()
    {

    }
}
