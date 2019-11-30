@extends('layouts.app')

@section('title', 'User listing')

@section('hero-title', 'All users')
@section('hero-subtitle', 'List of active users')

@section('content')
<div class="columns">
    <div class="column">
        <div class="card">
            <h1 class="title is-5">Users</h1>
            <hr>
            <p>Currently active users: <span class="tag is-small is-rounded"><strong>{{ $users->total() }}</strong></span></p>
            <hr>
            @foreach($users as $user)
            <div class="columns">
                <div class="column">
                    <h1 class="title is-6">{{ $user->name }}</h1>
                </div>
                <div class="column is-narrow">
                    <a class="button is-primary is-small" href="{{ route('user.show', $user->id) }}"><strong>View profile</strong></a>
                </div>
            </div>
            @endforeach

            {{ $users->links() }}
        </div>


    </div>
</div>
@endsection