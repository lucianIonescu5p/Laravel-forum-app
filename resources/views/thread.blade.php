@extends('layouts.layout')

@section('content')
    <div class="container" style="margin-top:50px">
        <div style="margin-bottom: 20px;">
            <h1> {{ strtoupper($thread->title) }} </h1>
            <div> {{ __('Created by: ') . $user->name }} </div>
        </div>

        <div>
            <h3> {{ $thread->description }} </h3>
        </div>
        <div class="row">

            @forelse($posts as $post)
            @empty
                <div> {{ __('No Posts yet...') }} </div>
            @endforelse
        </div>
    </div>
@endsection
