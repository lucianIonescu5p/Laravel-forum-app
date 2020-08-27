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
            <div class="col-md-12">
                @forelse ($posts as $post)
                    <div>
                        <div>
                            {{ '@' . str_replace(' ', '', ucwords($post->user->name)) . ' said:' }}
                        </div>

                        <div style="padding:5px; margin-bottom:5px; border:1px solid lightgray; display: flex; flex-direction: column;">
                            <div>
                                {{ $post->content }}
                            </div>
                            <a href="" style="text-align: end">{{ __('Reply') }}</a>
                        </div>
                    </div>
                @empty
                    <div> {{ __('No Posts yet...') }} </div>
                @endforelse

                {{ $posts->links() }}

                @if (session()->has('isAdmin'))
                    <form method="POST" action="/comment">
                        @csrf
                        <div class="form-group">
                            <textarea cols="10" rows="7" name="message" class="form-control" placeholder="Add a comment..."></textarea>
                        </div>

                        @if ($errors->has('message'))
                            <p>{{ $errors->first('message') }}</p>
                        @endif

                        <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                @endif

            </div>
        </div>
    </div>
@endsection
