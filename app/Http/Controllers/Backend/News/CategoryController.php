<?php

namespace App\Http\Controllers\Backend\News;

use App\Http\Controllers\Controller;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $backendPath = 'backend.';
    protected $backendPagePath = 'backend.pages.';

    public function index()
    {
        $categoryData = Category::all();
        return view($this->backendPagePath . 'news.category.index', compact('categoryData'));
    }


    public function create()
    {
        return view($this->backendPagePath . 'news.category.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->slug);
        if (Category::create($data)) {
            return redirect()->route('admin-category.index')->with('success', 'Category created successfully');
        } else {
            return redirect()->route('admin-category.index')->with('error', 'Category created failed');
        }
    }


    public function show($id)
    {
        $categoryData = Category::findOrFail($id);
        return view($this->backendPagePath . 'news.category.show', compact('categoryData'));

    }

    public function edit($id)
    {
        $categoryData = Category::findOrFail($id);
        return view($this->backendPagePath . 'news.category.update', compact('categoryData'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,' . $id,
            'slug' => 'required|unique:categories,slug,' . $id,
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->slug);
        if (Category::findOrFail($id)->update($data)) {
            return redirect()->route('admin-category.index')->with('success', 'Category updated successfully');
        } else {
            return redirect()->route('admin-category.index')->with('error', 'Category updated failed');
        }
    }


    public function destroy($id)
    {
        if (News::where('category_id', $id)->count() > 0) {
            return redirect()->back()->with('error', 'Category deleted failed, because this category has news');
        } else {
            if (Category::findOrFail($id)->delete()) {
                return redirect()->route('admin-category.index')->with('success', 'Category deleted successfully');
            } else {
                return redirect()->route('admin-category.index')->with('error', 'Category deleted failed');
            }
        }
    }
}
