<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReplyStoreRequest;

class ReplyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(ReplyStoreRequest $request, $post_id)
    {

        $reply = new Reply([
            'body' => $request->reply_body,
            'user_id' => Auth::user()->id,
            'post_id' => $post_id
        ]);

        $reply->save();

        return redirect()->route('post.show', Post::findOrFail($post_id));
    }
}
