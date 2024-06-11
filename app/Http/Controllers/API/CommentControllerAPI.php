<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class CommentController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'content' => 'required'
        ]);

        $article->comments()->create([
            'content' => $validatedData['content'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('articles.show', $article);
    }
}