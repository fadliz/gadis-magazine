<?php

namespace App\Http\Controllers\API;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class CommentControllerAPI extends BaseController
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

        $comment = $article->comments()->create([
            'content' => $validatedData['content'],
            'user_id' => Auth::id(),
        ]);

        return response()->json(['comment' => $comment], 200);
    }
}