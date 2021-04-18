@extends('layouts.app')

@section('title')
    <title>{{ config('app.name', 'Laravel Forum') }}</title>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Channels
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Name
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>
                </thead>
                <tbody>
                    @foreach ($channels as $channel)
                        <tr>
                            <td>
                                {{ $channel->title }}
                            </td>
                            <td>
                                <a href="{{ route('channel.edit', ['id' => $channel->id]) }}" class="btn btn-xs btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('channel.destroy', ['id' => $channel->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="{{ route('channel.store') }}" method="post">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" name="title" class="form-control" placeholder="Create a new channel">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Submit</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
@endsection
