@extends('layouts.layout')

@section('content')
    <div class="container" style="margin-top:50px">
        <div style="margin-bottom: 10px">
            <h1> {{ __('Categories') }} </h1>
        </div>

        <div class="row" style="margin-bottom:10px;">
            @forelse ($categories as $category)
                <div class="col-md-4 card">
                    <a href="{{ '/' . $category->title }}">
                        <div>
                            <b>{{ $category->title }}</b>
                        </div>
                        <div>
                            {{ __('Description') . ": " . $category->description }}
                        </div>

                        <small>
                            {{ 'Threads: ' . count($category->threads) }}
                        </small>
                    </a>
                </div>
            @empty
                {{ __('Nothing here yet') }}
            @endforelse
        </div>

        @if (session()->has('isAdmin') && $user->role)
            <form method="POST" action="/category">
                @csrf

                <div class="form-group">
                    <input class="form-control" type="text" name="category" placeholder="Add category">
                </div>

                @if ($errors->has('category'))
                    <p>{{ $errors->first('category') }}</p>
                @endif

                <div class="form-group">
                    <textarea cols="10" rows="7" name="description" class="form-control" placeholder="Description"></textarea>
                </div>

                @if ($errors->has('description'))
                    <p>{{ $errors->first('description') }}</p>
                @endif

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @endif
    </div>
@endsection
