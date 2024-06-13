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
        Log::info($request);
        $validatedData = $request->validate([
            'content' => 'required',
            'user_id' => 'required',
        ]);

        $comment = $article->comments()->create([
            'content' => $validatedData['content'],
            'user_id' => $validatedData['user_id'],
        ]);

        return response()->json(['comment' => $comment], 201);
    }
}