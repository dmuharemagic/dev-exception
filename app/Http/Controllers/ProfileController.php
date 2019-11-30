<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{

    public function show($id)
    {
        $user = User::with('posts')->findOrFail($id);
        $countPost = $user->posts->count();
        $countReply = $user->replies->count();
        $countVote = $user->votes->sum('value');
        return view('profile', compact('user', 'countPost', 'countReply', 'countVote'));
    }

    public function list()
    {
        $users = User::paginate(10);
        return view('users', compact('users'));
    }
}
