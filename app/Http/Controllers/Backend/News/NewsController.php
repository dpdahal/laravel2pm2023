<?php

namespace App\Http\Controllers\Backend\News;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use App\Models\News\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    private $backendPath = 'backend.';
    protected $backendPagePath = 'backend.pages.';

    public function index()
    {
        $newsData = News::all();
        return view($this->backendPagePath . 'news.index', compact('newsData'));
    }


    public function create()
    {
        $categoryData = Category::all();
        return view($this->backendPagePath . 'news.create', compact('categoryData'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:news,title',
            'slug' => 'required|unique:news,slug',
            'category_id' => 'required',

        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->slug);
        if ($request->hasFile('image')) {
            $data['image'] = $this->singleFileUpload('uploads/news');
        }
        if (News::create($data)) {
            return redirect()->route('admin-news.index')->with('success', 'News created successfully');
        } else {
            return redirect()->route('admin-news.index')->with('error', 'News created failed');
        }
    }


    public function show($id)
    {
        $newsData = News::findOrFail($id);
        return view($this->backendPagePath . 'news.show', compact('newsData'));
    }


    public function edit($id)
    {
        $newsData = News::findOrFail($id);
        $categoryData = Category::all();
        return view($this->backendPagePath . 'news.update', compact('newsData', 'categoryData'));
    }


    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|unique:news,title,' . $news->id,
            'slug' => 'required|unique:news,slug,' . $news->id,
            'category_id' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->slug);
        if ($request->hasFile('image')) {
            $fileName = $news->image;
            $this->deleteFile($fileName);
            $data['image'] = $this->singleFileUpload('uploads/news');
        }
        if ($news->update($data)) {
            return redirect()->route('admin-news.index')->with('success', 'News updated successfully');
        } else {
            return redirect()->route('admin-news.index')->with('error', 'News updated failed');
        }
    }


    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $fileName = $news->image;
        $this->deleteFile($fileName);
        if ($news->delete()) {
            return redirect()->route('admin-news.index')->with('success', 'News deleted successfully');
        } else {
            return redirect()->route('admin-news.index')->with('error', 'News deleted failed');
        }
    }
}
