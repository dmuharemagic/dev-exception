@extends('layouts.app')

@section('title', 'Create post')

@section('hero-title', 'Create post')
@section('hero-subtitle', 'Please fill out all the fields!')

@section('content')

<div class="columns">
    <div class="column">
        <div class="card no-padding">
            <div class="card-content">
                <form method="POST" action="{{ route('post.store') }}">
                    {{ csrf_field() }}

                    @include('partials.errors')

                    <div class="field">
                        <label class="label">Title</label>
                        <div class="control">
                            <input class="input is-shadowless" type="text" placeholder="Enter your title..." name="title" value="{{ old('title') }}" required autofocus>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Link</label>
                        <div class="control">
                            <input class="input is-shadowless" type="text" placeholder="Enter your link here (optional)" name="link" value="{{ old('link') }}" >
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Image</label>
                        <div class="control">
                            <input class="input is-shadowless" type="text" placeholder="Enter your image link here (optional)" name="image" value="{{ old('image') }}" >
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <textarea class="textarea" placeholder="Enter your content here..." name="body">{{ old('textarea') }}</textarea>
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-primary" type="submit">Post</button>
                        </div>
                        <div class="control">
                            <button class="button" type="reset">Clear</button>
                        </div>
                    </div>


                </form>
            </div>

        </div>
    </div>
</div>

@endsection