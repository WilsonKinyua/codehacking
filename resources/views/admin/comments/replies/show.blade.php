@extends('layouts.admin')


@section('content')


    <h1>View All Comments</h1>

    <table class="table table-hover table-bordered">
        @include('include.flash_message')
        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>View Post</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Delete Comment</th>
            </tr>
        </thead>
            @if ($replies)
          @foreach($replies as $reply)
            <tbody>
            <tr>
                <td>{{$reply->id}}</td>
                <td>{{$reply->author}}</td>
                <td>{{$reply->email}}</td>
                <td>{{$reply->body}}</td>
                <td><a href="{{route('home.post',$reply->comment->post->id)}}">View Post</a></td>
                <td>
                    @if ($reply->is_active == 1)
                    {!! Form::open(['method'=>'PATCH', 'action'=> ['AdminPostsCommentsRepliesController@update', $reply->id]]) !!}
                    <input type="hidden" name="is_active" value="0">
                    <div class="form-group">
                        {!! Form::submit('Un-approve', ['class'=>'btn btn-info']) !!}
                    </div>
                    {!! Form::close() !!}
                        @else
                        {!! Form::open(['method'=>'PATCH', 'action'=> ['AdminPostsCommentsRepliesController@update', $reply->id]]) !!}
                        <input type="hidden" name="is_active" value="1">
                        <div class="form-group">
                            {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                        </div>
                        {!! Form::close() !!}
                    @endif
                </td>
                <td>{{$reply->created_at->diffForHumans()}}</td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminPostsCommentsRepliesController@destroy', $reply->id]]) !!}
                    {!! Form::submit('Delete Reply', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                 </td>
            </tr>
        </tbody>
            @endforeach
            @else
                <h1 class="text-center">No Comments To display</h1>
            @endif
    </table>
    
@endsection