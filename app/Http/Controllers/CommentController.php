<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // このラインを追加

class CommentController extends Controller
{
    public function create($user_id) 
    {
        if (!Auth::check()) {
            return view('rokomitoukou', ['error_message' => 'ゲスト同士の口コミ投稿サイトはまだできてません。
            しばらくお待ちください']); 
        }
        
        

        $user = User::find($user_id);
        if (!$user) {
            return view('rokomitoukou', ['error_message' => 'ゲスト同士の口コミ投稿サイトはまだできてません。
            しばらくお待ちください']);
        }

        return view('rokomitoukou', ['user' => $user]);
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
            'to_user_id' => $request->route('user_id')
        ]);

        return redirect()->route('rokomi.index', $request->route('user_id'))->with('message', 'コメントを投稿しました');
    }
}
