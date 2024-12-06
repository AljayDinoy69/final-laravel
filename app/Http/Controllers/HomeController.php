<?php

namespace App\Http\Controllers;

use App\Models\Category;

public function home()
{
    $categories = Category::all();
    return view('home', compact('categories'));
}
