@extends('layouts.blog-post')



@section('content')



    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->

    <p>{{$post->body}}</p>

    <hr>
<!-- Blog Comments -->
@if (Auth::check())
    

<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    @include('include.flash_message')
    {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsCommentsController@store' , "files"=>true]) !!}
        {!! Form::hidden('post_id', $post->id, ['class'=>'form-control']) !!}
        {{-- {!! Form::hidden('photo', $user->photo_id, ['class'=>'form-control']) !!} --}}
        {!! Form::label('body', 'Comment') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        <br>
        {!! Form::submit('Submit Comment', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
@endif
<hr>

<!-- Posted Comments -->
<!-- Comment -->
@if (count($comments) > 0)
@foreach ($comments as $comment)
<div class="media">
    <a class="pull-left" href="#">
        {{-- <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" class="img-rounded" width="60" height="60" style="border-radius: 20px" src="{{$comment->photo}}" alt="">
            </a>
            <div class="media-body"> --}}
        <img class="media-object" class="img-rounded" width="60" height="60" style="border-radius: 20px" src="{{$comment->photo}}" alt="">
    </a>
         <div class="media-body">
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>
                    <p>{{$comment->body}}</p>
                {{-- <div class="container-replies">
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#nested-comment" aria-expanded="false" aria-controls="collapseExample">
                        View Replies
                    </button>
                </div> --}}
                 @if(count($comment->replies) > 0)
                    @foreach($comment->replies as $reply)

                    <div id="nested-comment" class="media">
                    <a class="pull-left" href="#">
                        <img class="img-rounded" width="60" height="60" style="border-radius: 20px" class="media-object" src="{{$reply->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"{{$reply->author}}
                            <small>{{$reply->created_at->diffForHumans()}}</small>
                        </h4>
                        <p>{{$reply->body}}</p>
                    </div>
                  
                </div>
                @endforeach
                @endif
                <div class="comment-reply-container">
                    <div class="comment-reply">
                        {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsCommentsRepliesController@createReply']) !!}
                        <div class="form-group">
                        {!! Form::hidden('comment_id', $comment->id, ['class'=>'form-control']) !!}
                        {!! Form::label('body', 'Comment Reply') !!}
                        {!! Form::textarea('body', null, ['class'=>'form-control', "rows"=>2]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Submit Reply', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                     </div>
                </div>
        <!-- End Nested Comment -->
    </div>
</div>
@endforeach
@endif




@endsection