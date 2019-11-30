@extends('layouts.app')

@section('title', 'Profile view')

@section('hero-title')
{{ $user->name }}
@endsection
@section('hero-subtitle', 'User profile')

@section('content')
<div class="columns">
    <div class="column">
        <div class="card">
        <h1 class="title is-5">Profile</h1>
        <div class="columns">
        <div class="column">
        <p class="card-meta">Joined: <span class="tag is-small is-light">{{ $user->created_at->diffForHumans() }}</span></p>
        </div>
        <div class="column">
        <p class="card-meta">Posts: <span class="tag is-small is-light">{{ $countPost }} {{ str_plural('post', $countPost) }}</span></p>
        </div>
        <div class="column">
        <p class="card-meta">Replies: <span class="tag is-small is-light">{{ $countReply }} {{ str_plural('reply', $countReply) }}</span></p>
        </div>
        <div class="column">
        <p class="card-meta">Gained votes: <span class="tag is-small is-light">{{ $countVote }} {{ str_plural('vote', $countVote) }}</span></p>
        </div>
        </div>
        </div>
        <div class="card">
            <h1 class="title is-5">Posts</h1>
            <hr>
            @forelse($user->posts as $post)
            <h1 class="title is-6 card-title">
                <div class="columns is-vcentered">

                    @if((!empty($post->link)) && (!empty($post->image)))
                    <div class="column is-narrow">
                        <div class="tags are-small"><span class="tag is-light">LINK</span><span class="tag is-light">IMAGE</span></div>
                    </div>
                    @elseif(!empty($post->link))
                    <div class="column is-narrow">
                        <span class="tag is-light is-small">LINK</span>
                    </div>
                    @elseif(!empty($post->image))
                    <div class="column is-narrow">
                        <span class="tag is-light is-small">IMAGE</span>
                    </div>
                    @endif

                    <div class="column">
                        @if(!empty($post->link) || !empty($post->image))
                        <a href="{{ route('post.show', $post) }}">{{ $post->title }} </a> &#183; <span class="card-meta">{{ $post->created_at->diffForHumans() }}</span>
                        @else
                        <a href="{{ route('post.show', $post) }}">{{ $post->title }} </a> &#183; <span class="card-meta">{{ $post->created_at->diffForHumans() }}</span>
                        @endif
                    </div>

                    <div class="column is-narrow">
                    <span class="menu-label">{{ $post->votes->sum('value') }} points &#183; {{ $post->replies->count() }} replies</span>
                    </div>


                </div>
            </h1>
            <hr>
            @empty
            <p>This user hasn't posted yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection