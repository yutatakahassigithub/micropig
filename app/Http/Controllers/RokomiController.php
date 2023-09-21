<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Comment; 
use App\Models\User;
use Illuminate\Http\Request;

    class RokomiController extends Controller
    {
    
     public function index()
    {
    $comments = Comment::with('fromUser', 'toUser')->get();
    return view('rokomimiru', ['comments' => $comments]);
    }

     
    
    public function destroy($id)
    {
    $comment = Comment::findOrFail($id);

    // 本当にコメントを削除できるユーザーか確認
    if (Auth::id() !== $comment->from_user_id) {
        return redirect()->back()->with('error', '権限がありません');
    }

    $comment->delete();
    
    return redirect()->back()->with('success', 'コメントが削除されました！');
    }

    
        // ... 他のメソッド
    
        public function __construct()
        {
        $this->middleware('auth')->except('index');
        }
    
        public function store(Request $request, $user_id) 
         {
        $request->validate([
            'comment' => 'required|string',
            'evaluation' => 'required|integer|min:1|max:5',
        ]);
    
        $fromUserId = auth()->check() ? auth()->id() : null;
    
        Comment::create([
    'comment' => $request->comment,
    'evaluation' => $request->evaluation,
   'from_user_id' => Auth::id(),
    'to_user_id' => $user_id
]);

        return redirect()->back()->with('success', 'コメントが投稿されました！');
    }

}