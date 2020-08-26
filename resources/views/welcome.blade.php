@extends('layouts.layout')

@section('content')
    <div class="container" style="margin-top:50px">
        <div>
            <h1> {{ __('Categories') }} </h1>
        </div>

        <div class="row">
            @forelse($categories as $category)
                <div class="col-md-4 card">
                    <a href="{{ '/' . $category->title }}">
                        <div>
                            <b>{{ $category->title }}</b>
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
    </div>
@endsection
