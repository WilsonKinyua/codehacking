@extends("layouts.admin")


@section('content')

<h1>View All Posts Page</h1>
<table class="table table-hover table-bordered">
    @include('include.flash_message')
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Category</th>
            <th>Post Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Edit Post</th>
            <th>Delete User</th>
        </tr>
    </thead>
    <tbody>
        @if ($posts)
        @foreach ($posts as $post)
        <tr>
          
            <td>{{$post->id}}</td>
            <td>{{$post->user ? $post->user->name : "No User For this Post"}}</td>
            <td>{{$post->category ? $post->category->name : "No category"}}</td>
            <td><img height="100" width="200" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }} " alt=""></td>
            <td><a href="{{ route('home.post',$post->id)}}">{{$post->title}}</a></td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
            <td><a href="{{'/admin/posts/' . $post->id . "/edit"}}"><input type="button" class="btn btn-primary" value="Edit Post"></a></td>
            <td>

                {!! Form::open(['method'=>'DELETE', "action"=>['AdminPostsController@destroy',$post->id], 'files'=>true]) !!}
                {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}

             </td>
            <td><a href="{{ route('comment.post', $post->id)}}">View Comment</a></td>
        </tr>
        @endforeach
        @endif
       
    </tbody>
</table>
@endsection