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
                <a href="{{ route('discussion.show', ['slug' => $discussion->slug]) }}" class="btn btn-xs btn-default pull-right">View</a>
            </div>
            <div class="panel-body">
                <h4 class="text-center">
                    @if ($discussion->hasBestAnswer())
                        <span class="label label-success">
                            Closed
                        </span>
                    @else
                        <span class="label label-danger">
                            Open
                        </span>
                    @endif
                    &nbsp;
                    <b>{{ $discussion->title }}</b>
                </h4>
                <p class="text-center">
                    {{ str_limit($discussion->content, 100) }}
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
