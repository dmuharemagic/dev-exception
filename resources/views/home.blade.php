@extends('layouts.app')

@section('title', 'Front page')

@section('hero-title', 'Posts')
@section('hero-subtitle', 'Welcome passengers!')

@section('content')
<div class="columns">
    <div class="column is-3">
        <aside class="menu">
            <p class="menu-label">
                Sort by
            </p>
            <ul class="menu-list">
                <a href="{{ route('sort.hot') }}">
                    <li>Hot</li>
                </a>
                <a href="{{ route('sort.new') }}">
                    <li>New</li>
                </a>
                <a href="{{ route('sort.rising') }}">
                    <li>Rising</li>
                </a>
                <a href="{{ route('sort.default') }}">
                    <li>Default</li>
                </a>
            </ul>
    </div>
    <div class="column is-9">

        <div class="columns">
            <div class="column is-narrow">
                <h1 class="title is-5">Sort</h1>
            </div>
            <div class="column">
                <div class="tags are-small">
                    <span class="tag {{ request()->is('/') ? 'is-primary' : 'is-article-tag' }}">Default</span>
                    <span class="tag {{ request()->is('sort/hot') ? 'is-primary' : 'is-article-tag' }}">Hot</span>
                    <span class="tag {{ request()->is('sort/new') ? 'is-primary' : 'is-article-tag' }}">New</span>
                    <span class="tag {{ request()->is('sort/rising') ? 'is-primary' : 'is-article-tag' }}">Rising</span>
                </div>
            </div>
            <div class="column is-narrow">
                <a class="button is-small is-primary is-outlined" href="{{ route('post.create') }}"><strong>Create post</strong></a>
            </div>
        </div>

        @foreach($posts as $post)
            @include('partials.post')
        @endforeach

        {{ $posts->links() }}
    </div>
</div>

@endsection