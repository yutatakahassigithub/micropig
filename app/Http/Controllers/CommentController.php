<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create()
    {
        return view('comments.create');
        return view('rokomitoukou', compact('userID'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|max:150',
            'evaluation' => 'required|integer|between:1,5',
            'to_user_id' => 'required|exists:users,id'
        ]);

        Comment::create([
            'comment' => $request->comment,
            'evaluation' => $request->evaluation,
            'from_user_id' => Auth::id(),
            'to_user_id' => $request->to_user_id
        ]);

        return redirect()->route('users.show', $request->to_user_id)->with('message', 'コメントを投稿しました');

    }
}
