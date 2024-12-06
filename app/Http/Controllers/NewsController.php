<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    // Home Page
    public function index()
    {
        $news = News::latest()->get();
        $categories = Category::all();
        return view('home', compact('news', 'categories'));
    }

    // Show News by Category
    public function showCategory(Category $category)
    {
        $news = $category->news()->get();
        $categories = Category::all(); // Ensure categories are available
        return view('category.show', compact('category', 'news', 'categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $news = new News();
    $news->title = $request->title;
    $news->description = $request->description;
    $news->category_id = $request->category_id;

    // Handle the image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('news_images', 'public');
        $news->image = $imagePath;
    }

    $news->save();

    return redirect()->route('news.index')->with('success', 'News added successfully.');
}


    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            \Storage::delete('public/' . $news->image);
        }
        $news->delete();

        return redirect()->route('home')->with('success', 'News deleted successfully.');
    }
}
