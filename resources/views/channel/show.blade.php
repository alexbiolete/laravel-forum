@extends('layouts.app')

@section('title')
    <title>{{ config('app.name', 'Laravel Forum') }}</title>
@endsection

@section('content')
    @foreach ($discussions as $discussion)
        <div class="panel panel-default">
            <div class="panel-heading">
                <img src="{{ $discussion->user->avatar }}" alt="Avatar" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                <span><b>{{ $discussion->user->name }}</b> &nbsp; {{ $discussion->created_at->diffForHumans() }}</span>
                <div class="btn-group pull-right" role="group" aria-label="...">
                    {{-- @if ($discussion->is_being_watched_by_auth_user())
                        <a href="{{ route('discussion.unwatch', ['id' => $discussion->id]) }}" class="btn btn-warning">Unwatch</a>
                    @else    
                        <a href="{{ route('discussion.watch', ['id' => $discussion->id]) }}" class="btn btn-info">Watch</a>
                    @endif --}}
                    <a href="{{ route('discussion.show', ['slug' => $discussion->slug]) }}" class="btn btn-default">View</a>
                </div>
            </div>
            <div class="panel-body">
                <h4 class="text-center">
                    <b>{{ $discussion->title }}</b>
                </h4>
                <hr>
                <p class="text-center">
                    {{ $discussion->content }}
                </p>
            </div>
            <div class="panel-footer">
                <span>
                    {{ $discussion->replies->count() }} replies
                </span>
                <a href="{{ route('channel.show', ['slug' => $discussion->channel->slug]) }}" class="btn btn-xs btn-default pull-right">
                    {{ $discussion->channel->title }}
                </a>
            </div>
        </div>
    @endforeach

    <div class="text-center">
        {{ $discussions->links() }}
    </div>
@endsection
