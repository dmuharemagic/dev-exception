@extends('layouts.app')

@section('title')
{{ $post->title }}
@endsection

@section('hero-title')
{{ $post->title }}
@endsection
@section('hero-subtitle')
Author: {{ $post->user->name }}
@endsection

@section('content')

@include('partials.post')

<div class="card ">
  <h1 class="title is-5">Replies</h1>
  <hr>

  @guest
  <div class="tile notification is-primary">In order to reply, you need to log in first.</div>
  @endguest

  <form method="POST" action={{ route('reply.store', $post->id) }}>
    {{ csrf_field() }}

    @include('partials.errors')

    <div class="field">
      <div class="control">
        <textarea class="textarea" placeholder="Write a response..." name="reply_body" @guest {{ 'disabled' }} @endguest></textarea>
      </div>
    </div>

    <div class="field is-grouped">
      <div class="control">
        <button class="button is-primary" type="submit" @guest {{ 'disabled' }} @endguest>Post</button>
      </div>
      <div class="control">
        <button class="button" type="reset" @guest {{ 'disabled' }} @endguest>Clear</button>
      </div>
    </div>
  </form>

  <hr>

  @forelse($replies as $reply)
  <div class="columns">
    <div class="column">
      <div class="columns is-vcentered">
      <div class="column is-narrow">
            <div class="avatar"><i class="fas fa-user"></i></div>
      </div>
      <div class="column avatar-meta-right">
      <span class="card-meta">{{ $reply->user->name }}</span> &#183; <span class="card-meta-light">{{ $reply->created_at->diffForHumans() }}</span>
      </div>
      </div>
      <p>{{ $reply->body }}</p>
      <hr>
    </div>
  </div>
  @empty
  <div class="columns">
    <div class="column">
      <p>There are no replies for this post.</p>
    </div>
  </div>
  @endforelse

  {{ $replies->links() }}
</div>
@endsection