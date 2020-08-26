@extends('layouts.layout')

@section('content')
    <div class="container" style="margin-top:50px">
        <div>
            <h1> {{ __('Threads for') . ' ' . strtoupper($category) }} </h1>
        </div>

        <div class="row">
            @forelse($threads as $thread)
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
    </div>
@endsection
