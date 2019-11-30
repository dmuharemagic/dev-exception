<?php

namespace App\Http\Controllers;

use App\Post;
use App\Vote;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'edit', 'vote']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user.votes')->paginate(10);
        return view('home', compact('posts'));
    }

    public function hot()
    {
        $posts = Post::with('user.votes')->hottest()->paginate(10);
        return view('home', compact('posts'));
    }

    public function new()
    {
        $posts = Post::with('user.votes')->newest()->paginate(10);
        return view('home', compact('posts'));
    }

    public function rising()
    {
        $posts = Post::with('user.votes')->rising()->paginate(10);
        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {

        $post = new Post([
            'title' => $request->title,
            'link' => $request->link,
            'image' => $request->image,
            'body' => $request->body,
            'slug' => Str::slug($request->title, '-'),
            'user_id' => Auth::user()->id
        ]);

        $post->save();

        return redirect()->route('post.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $replies = $post->replies()->latest()->paginate(5);
        return view('post.view', compact('post', 'replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request) {
        if(!empty($request->term)) {
            $results = Post::where('title', 'LIKE', '%' . $request->term . '%')->take(5)->get(['title', 'slug']);
            return response()->json($results);
        }
    }

    public function random()
    {
        $post = Post::inRandomOrder()->first();
        $replies = $post->replies()->latest()->paginate(5);
        return view('post.view', compact('post', 'replies'));
    }

    public function vote($id, $type)
    {

        $user = Auth::user();

        $vote = Vote::where(['user_id' => $user->id, 'post_id' => $id])->first();

        $value = $type == 'up' ? 1 : -1;

        if ($vote) {
            if ($vote->value == $value) {
                $vote->delete();
                return response('deleted');
            } else {
                $vote->update(['value' => $value]);
                return response('updated');
            }
        } else {
            $vote = new Vote([
                'value' => $value,
                'post_id' => $id,
                'user_id' => Auth::user()->id
            ]);

            $vote->save();
            return response('saved');
        }

        // if ($user->checkIfVoted($id) == false) {
        //     $vote = new Vote([
        //         'value' => $type == 'up' ? 1 : -1,
        //         'post_id' => $id,
        //         'user_id' => Auth::user()->id
        //     ]);

        //     $vote->save();
        //     return response('saved');
        // } else {
        //     if (($user->getVote$id)[0] == -1 && $type == 'up') || $user->getVote($id)[0] == 1 && $type == 'down') {
        //         $vote = Vote::where(['user_id' => Auth::user()->id, 'post_id' => $id])->update(['value' =>  $type == 'up' ? 1 : -1]);
        //         return response('updated');
        //     } else {
        //         return response('denied');
        //     }
        // }
    }
}
