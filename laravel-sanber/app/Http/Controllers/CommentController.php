<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
class CommentController extends Controller
{
    public function store(Request $request, $book_id){
        $request->validate([
            'content' => 'required'
            ]);
            $userId= Auth::id();

            $comment = new Comment;
            $comment->content = $request->input('content');
            $comment->user_id = $userId;
            $comment->book_id = $book_id;

            $comment->save();
    
              return redirect ('/books/'. $book_id)->with('success', 'update comemnt berhasil');
}


public function destroy($id)
{
    $comment = Comment::findOrFail($id);

    // Cuma admin yang boleh hapus
    if (Auth::user()->role !== 'admin') {
        abort(403);
    }

    $comment->delete();

    return back()->with('success', 'Comment berhasil dihapus');
}
}


