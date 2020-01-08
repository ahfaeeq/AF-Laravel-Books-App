@extends('layouts.app')

@section('content')
<div class="jumbotron">
    @guest
        <h1 class="display-4">Hello, Guest!</h1>
        <p class="lead">You can browse books and authors, if you would like to add a new authors or books please <a href="{{ route('login') }}">{{ __('Login') }}</a> or <a href="{{ route('register') }}">{{ __('Register') }}</a></p>
    @else
        <h1 class="display-4">Hello, {{ Auth::user()->name }}!</h1>
        <p class="lead">You can browse books and authors, if you would like to add a new books please <a href="{{ route('books.create') }}">Click here</a></p>
    @endguest
</div>

    <div class="row">
        <div class="col-sm-4">
            <a href="{{ route('books.index') }}" type="button" class="btn btn-primary btn-block text-white">Browse Books</a>
        </div>
        <div class="col-sm-4">
            <a href="{{ route('books.index') }}" type="button" class="btn btn-primary btn-block text-white">Browse Authors</a>
        </div>
        <div class="col-sm-4">
            @guest
                <a href="{{ route('login') }}" type="button" class="btn btn-primary btn-block text-white">{{ __('Login') }}</a>
            @else
                <a  class="btn btn-primary btn-block text-white" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest

        </div>
    </div>
@endsection