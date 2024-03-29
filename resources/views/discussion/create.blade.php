@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            Create a new discussion
        </div>
        <div class="panel-body">
            <form action="{{ route('discussion.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="channel">Pick a channel</label>
                    <select name="channel_id" id="channel_id" class="form-control">
                        @foreach ($channels as $channel)
                            <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Question</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">Describe</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-sucess pull-right" type="submit">
                        Create discussion
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection