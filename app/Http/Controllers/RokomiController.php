// app/Http/Controllers/RokomiController.php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RokomiController extends Controller
{
        public function index($user_id)
    {
        if ($user_id == 'guest') {
            // ゲスト用の動作を記述する。例えば特定のデモユーザーのデータを表示するなど。
            // ここでは仮のユーザーを取得しています。実際の実装に合わせて変更してください。
            $user = User::where('email', 'guest@example.com')->first();
        } else {
            $user = User::with('commentsToUser', 'commentsToUser.fromUser')->findOrFail($user_id);
        }
    
        return view('rokomi', ['profile' => $user]);
    }
  public function store(Request $request, $user_id) 
{
    $request->validate([
        'comment' => 'required|string',
        'evaluation' => 'required|integer|min:1|max:5',
    ]);

    $fromUserId = auth()->check() ? auth()->id() : null;  // ログインしているユーザーのIDまたはゲストの場合はnull

    Comment::create([
        'comment' => $request->comment,
        'evaluation' => $request->evaluation,
        'to_user_id' => $user_id,
        'from_user_id' => $fromUserId,
    ]);

    return redirect()->back()->with('success', 'コメントが投稿されました！');
}




}
