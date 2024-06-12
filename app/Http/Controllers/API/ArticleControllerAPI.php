<?php

namespace App\Http\Controllers\API;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Controllers\Auth\PasswordController;
// return response()->json(['comment' => $comment], 200);

class ArticleControllerAPI extends Controller
{
    public function index()
    {
        $articles = Article::paginate(5);
        return response()->json(['articles' => $articles], 200);
    }

    public function create()
    {
        return response()->json(['articles' => []], 200);
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

        $article = Article::create($validatedData);

        return response()->json(['article' => $article], 200);
    }

    public function show(Article $article)
    {
        $article->load([
            'comments' => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
            'comments.user'
        ]);

        // Optional: Log the response for debugging
        Log::info('Article retrieved', ['article' => $article]);

        return response()->json(['article' => $article]);
    }

    public function fetchFourComment(Article $article)
    {
        $article->load([
            'comments' => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
            'comments.user'
        ]);
        $comments = $article->comments->take(4);

        Log::info($comments);
        return response()->json(['comments' => $comments]);
    }

    public function fetchComments(Article $article)
    {
        $count = $article->comments()->with(['user'])->count();
        $skip = 4;
        $limit = $count - $skip; // the limit
        Log::info($limit);
        if ($limit < 0) {
            return response()->json(['comments' => []]);
        }
        $comments = $article->comments()->with(['user'])->orderByDesc('created_at')->skip(4)->take($limit)->get();
        Log::info(response()->json(['comments' => $comments]));
        return response()->json(['comments' => $comments]);
    }

    public function fetchLatestArticles()
    {
        $latestArticles = Article::latest()->take(3)->get();
        return response()->json(['articles' => $latestArticles], 200);
    }
}
