@extends('layouts.layout')

@section('content')
    <div class="container" style="margin-top:50px">
        <div>
            <h1> {{ __('Threads for') . ' ' . strtoupper($category) }} </h1>
            @if (session()->has('isAdmin'))
                <a class="button" href="">{{ __('Add Thread') }}</a>
            @endif
        </div>

        <div class="row" style="margin-bottom:10px;">
            @forelse ($threads as $thread)
                <div class="col-md-4 card">
                    <a href="{{ '/' . $thread->categories->title . '/' . $thread->title }}">
                        <div>
                            <b>{{ $thread->title }}</b>
                        </div>

                        <small>
                            {{ 'Comments: ' . count($thread->posts) }}
                        </small>
                    </a>
                </div>
            @empty
                {{ __('Nothing here yet') }}
            @endforelse
        </div>

        @if (session()->has('isAdmin'))
            <form method="POST" action="/thread">
                @csrf

                <div class="form-group">
                    <input class="form-control" type="text" name="thread" placeholder="Add thread">
                </div>

                @if ($errors->has('thread'))
                    <p>{{ $errors->first('thread') }}</p>
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
