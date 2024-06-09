<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve the 3 latest articles
        $latestArticles = Article::latest()->take(3)->get();

        // Pass the articles to the view
        return view('dashboard', compact('latestArticles'));
    }
}
