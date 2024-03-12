<?php

namespace App\Http\Controllers\Groups;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function createComment(Request $request, $group_id, $post_id)//: RedirectResponse
    {
        $formData = $request->validate([
            'text' => 'max:255|required'
        ]);

        $comment = new Comment;

        $comment->text = $formData['text'];
        $comment->user_id = Auth::id();
        $comment->post_id = $post_id;

        $comment->save();

        //return redirect()->route('group_page', ['id' => $group_id]);
        return response()->json(['message' => 'Комментарий успешно добавлен', 'comment' => $comment], 200);
    }
}
