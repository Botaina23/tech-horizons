<?php
// app/Http/Controllers/CommentController.php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $articleId)
    {
        $validated = $request->validate([
            'message' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->message = $validated['message'];  // Utilisation de 'message' et non 'content'
        $comment->article_id = $articleId;
        $comment->user_id = Auth::id();
        $comment->save();

        return redirect()->route('articles.show', $articleId)
                         ->with('success', 'Commentaire ajouté avec succès.');
    }

}