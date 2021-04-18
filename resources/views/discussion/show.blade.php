@extends('layouts.app')

@section('title')
    <title>{{ config('app.name', 'Laravel Forum') }}</title>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <img src="{{ $discussion->user->avatar }}" alt="Avatar" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
            <span><b>{{ $discussion->user->name }}</b> <span class="badge">{{ $discussion->user->points }}</span> &nbsp; {{ $discussion->created_at->diffForHumans() }}</span>
            @if (Auth::id() == $discussion->user->id && !$best_answer)
                <a href="{{ route('discussion.edit', ['slug' => $discussion->slug]) }}" class="btn btn-xs btn-info pull-right">Edit</a>
            @endif
        </div>
        <div class="panel-body">
            <h4 class="text-center">
                <b>{{ $discussion->title }}</b>
            </h4>
            <hr>
            <p class="text-center">
                {{ $discussion->content }}
            </p>
            @if ($best_answer)
                <hr>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <img src="{{ asset($best_answer->user->avatar) }}" alt="Profile Picture" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                        <span><b>{{ $best_answer->user->name }}</b> <span class="badge">{{ $best_answer->user->points }}</span> &nbsp; {{ $best_answer->created_at->diffForHumans() }}</span>
                        <span class="badge pull-right">Best answer</span>
                    </div>
                    <div class="panel-body">
                        {{ $best_answer->content }}
                    </div>
                </div>
            @endif
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
    
    @foreach ($discussion->replies as $reply)
        <div class="panel panel-default">
            <div class="panel-heading">
                <img src="{{ $reply->user->avatar }}" alt="Avatar" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                <span><b>{{ $reply->user->name }}</b> <span class="badge">{{ $reply->user->points }}</span> &nbsp; {{ $reply->created_at->diffForHumans() }}</span>
                <div class="btn-group pull-right" role="group" aria-label="...">
                    @if (!$best_answer && Auth::id() == $discussion->user->id)
                        <a href="{{ route('reply.edit', ['id' => $reply->id]) }}" class="btn btn-xs btn-info">Edit</a>
                        <a href="{{ route('discussion.best.answer', ['id' => $reply->id]) }}" class="btn btn-xs btn-info">Mark as best answer</a>
                    @endif
                </div>
            </div>
            <div class="panel-body">
                <p class="text-center">
                    {{ $reply->content }}
                </p>
            </div>
            <div class="panel-footer">
                @if ($reply->is_liked_by_auth_user())
                    <a href="{{ route('reply.unlike', ['id' => $reply->id]) }}" class="btn btn-xs btn-danger">Unlike <span class="badge">{{ $reply->likes->count() }}</span></a>
                @else
                    <a href="{{ route('reply.like', ['id' => $reply->id]) }}" class="btn btn-xs btn-success">Like <span class="badge">{{ $reply->likes->count() }}</span></a>
                @endif
            </div>
        </div>
    @endforeach

    @if (Auth::check() && !$best_answer)
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="{{ route('discussion.reply', ['id' => $discussion->id]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="content">Leave a reply</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn pull-right" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    @else
        @if ($best_answer)
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h2>
                            This discussion is closed.
                        </h2>
                    </div>
                </div>
            </div>
        @else
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <h2>
                            Sign in to leave a reply
                        </h2>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endsection
