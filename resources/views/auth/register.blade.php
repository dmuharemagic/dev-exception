@extends('layouts.app')

@section('title', 'Register')

@section('hero-title', 'Register')
@section('hero-subtitle', 'Welcome passenger!')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column">
            <div class="card no-padding">
                <header class="card-header">
                    <p class="card-header-title">
                        Register
                    </p>
                </header>


                <div class="card-content">
                    <form method="POST" action="{{ route('register') }}" novalidate>
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
                                <label class="label">Name:</label>
                            </div>

                            <div class="field-body">
                                <div class="control">
                                    <input id="name" name="name" class="input is-shadowless {{ $errors->has('email') ? ' is-danger' : '' }}" type="text" value="{{ old('name') }}" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">E-mail address:</label>
                            </div>
                            <div class="field-body">
                                <div class="control">
                                    <input id="email" name="email" class="input is-shadowless {{ $errors->has('email') ? ' is-danger' : '' }}" type="email" value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Password:</label>
                            </div>
                            <div class="field-body">
                                <div class="control">
                                    <input id="password" name="password" class="input is-shadowless {{ $errors->has('password') ? ' is-danger' : '' }}" type="password">
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                                <label class="label">Confirm password:</label>
                            </div>
                            <div class="field-body">
                                <div class="control">
                                    <input id="password-confirm" type="password" class="input is-shadowless" name="password_confirmation">
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label"></div>

                            <div class="field-body">
                                <div class="control is-grouped">
                                    <button class="button is-primary" type="submit"><strong>Register</strong></button>
                                    <button type="reset" class="button is-light">Clear</button>
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