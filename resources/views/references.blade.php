@extends('layouts.app')

@section('title', 'References')

@section('hero-title', 'References')
@section('hero-subtitle', 'The technologies used for this project')

@section('content')
<div class="columns">
<div class="column">
        <div class="card">
        <h1 class="title is-5">About the project</h1>
        <hr>
        <p class="card-meta">Interactive online platform, similar to social media, reserved for programmers (programming humor and programming news).</p>
        <hr>
        <p><strong>DevException (DE)</strong> is an online platform meant to offer the viewer a large assortment of user-generated programming-based internet jokes or memes which they could then positively or negatively rate and/or share on other social media. It also includes the ability to share links of programming-related news, rather than just being a meme-platform.</p>
        <p>
DE’s theme of humor is programming. If the user feels they fit within a certain niche (i.e., Java, HTML, CSS, C++, etc.) they could search the site with tags, finding the desired content with relative ease. 
</p>
<p>
        </div>
        </div>

    <div class="column">
        <div class="card">
        <h1 class="title is-5">Technologies used</h1>
        <hr>
        <div class="tag is-medium is-primary">Laravel</div>
        <hr>
        <p>The Laravel Framework is a product trademark of Taylor Otwell. Rapid, expressive, and modern. Has a whole ecosystem behind it, along with a great community.</p>
        <hr>

        <div class="tag is-medium is-primary">Bulma</div>
        <hr>
        <p>A free, open-source CSS framework based on flexbox. Easy to use, and CSS-only (no JS). Extremely light.</p>
        <hr>

        <div class="tag is-medium is-primary">jQuery</div>
        <hr>
        <p>The most popular JS library - fast, small, and makes verbose things much less verbose.</p>
        </div>
        </div>
        </div>
@endsection