@extends("layouts.admin")


@section('content')
<div class="row">
    <div class="col-sm-3">
        
        <img src="{{$post->photo ? $post->photo->file : "http://placehold.it/400x400"}}" alt="" class="img-responsive img-rounded">
   
       </div>
<div class="col-sm-9">
{!! Form::model($post, ['method'=>'PATCH', 'action'=> ['AdminPostsController@update', $post->id],'files'=>true ]) !!}

<h1>Edit Post Page</h1>
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id','Category:') !!}
        {!! Form::select('category_id', $category , null , ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo: ') !!}
        {!! Form::file('photo_id' , ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body', 'Content:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>


 {!! Form::close() !!}
</div>
</div>
@include('include.form_error')
@endsection

