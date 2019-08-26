<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function comment( Request $request ) {
        $validate = $this->validate( $request,['content' => 'required']);

        $content = $request->input('content');
        $id = $request->input('id');
        $user_id = $request->input('user_id');

        if( !$content ) {
            return redirect()->route('home');
        }

        $comment = new Comment();

        $comment->user_id = $user_id;
        $comment->image_id = $id;
        $comment->content = $content;

        $comment->save();
        
        return redirect()->route('image.detail', ['id' => $id])
        ->with(['comment-success' => 'OK']);
    }

    public function delete( $id ) {
        $user = Auth::user();

        $comment = Comment::find( $id );
        
        if( $user && ($user->id == $comment->user_id || $comment->image->user_id == $user->id) ) {
            $comment->delete();
        }

        return redirect()->route('image.detail',['id' => $comment->image_id]);
    }
}
