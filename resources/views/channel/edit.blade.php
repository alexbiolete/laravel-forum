@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit channel
        </div>
        <div class="panel-body">
            <form action="{{ route('channel.update', ['id' => $channel->id]) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="title" value="{{ $channel->title }}" class="form-control">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-success" type="submit">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection