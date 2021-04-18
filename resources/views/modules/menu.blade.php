<a href="{{ route('discussion.create') }}" class="form-control btn btn-primary">Create new discussion</a>
<br><br>
<div class="list-group">
    <li class="list-group-item active">
        Channels
    </li>
    @foreach ($channels as $channel)
        <a href="{{ route('channel.show', ['slug' => $channel->slug]) }}" class="list-group-item">{{ $channel->title }}</a>
    @endforeach
</div>

<div class="list-group">
    <li class="list-group-item active">
        User Panel
    </li>
    <a href="{{ route('forum') }}" class="list-group-item">
        Forum
    </a>
    <a href="{{ route('forum') }}?filter=me" class="list-group-item">
        My Discussions
    </a>
    <a href="{{ route('forum') }}?filter=solved" class="list-group-item">
        Answered Discussions
    </a>
    <a href="{{ route('forum') }}?filter=unsolved" class="list-group-item">
        Unanswered Discussions
    </a>
</div>
@if (Auth::user()->admin)
<div class="list-group">
    <li class="list-group-item active">
        Administrator Panel
    </li>
    <a href="{{ route('channel.index') }}" class="list-group-item">
        Manage Channels
    </a>
</div>
@endif