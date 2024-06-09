<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(9);
        return view('articles.view', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
            'author' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        Article::create($validatedData);

        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        $article->load([
            'comments' => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
            'comments.user'
        ]);

        Log::info(response()->json(['comments' => $article]));
        return view('articles.show', compact('article'));
    }

    public function fetchComments(Article $article)
    {
        $count = $article->comments()->with(['user'])->count();
        $skip = 5;
        $limit = $count - $skip; // the limit
        Log::info($limit);
        $comments = $article->comments()->with(['user'])->orderByDesc('created_at')->skip(4)->take($limit)->get();
        Log::info(response()->json(['comments' => $comments]));
        return response()->json(['comments' => $comments]);
    }
}
