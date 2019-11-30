@extends('layouts.app')

@section('title', 'Log in')

@section('hero-title', 'Log in')
@section('hero-subtitle', 'Welcome passenger!')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column">
            <div class="card no-padding">
                <header class="card-header">
                    <p class="card-header-title">
                        Log in
                    </p>
                </header>

                <div class="card-content">
                    <form method="POST" action="{{ route('login') }}" novalidate>
                        {{ csrf_field() }}

                        @if ($errors->any())
                        <article class="message is-warning">
                            <div class="message-body">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </article>
                        @endif

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">E-mail address:</label>
                            </div>

                            <div class="field-body">
                                <div class="control">
                                    <input id="email" name="email" class="input is-shadowless {{ $errors->has('email') ? ' is-danger' : '' }}" type="email" placeholder="john@doe.com" value="{{ old('email') }}" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Password:</label>
                            </div>

                            <div class="field-body">
                                <div class="control">
                                    <input id="password" name="password" class="input is-shadowless {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" placeholder="Password">
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label"></div>

                            <div class="field-body">
                                <label class="checkbox">
                                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label"></div>

                            <div class="field-body">
                                <div class="control is-grouped">
                                    <button class="button is-primary" type="submit"><strong>Log in</strong></button>
                                    <a class="button is-light" href="{{ route('register') }}">Don't have an account?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection