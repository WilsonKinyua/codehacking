@extends("layouts.admin")


@section('content')
<div class="row">
<h1>Create Post Page</h1>

{!! Form::open(['method'=>'POST', 'action'=> 'AdminPostsController@store','files'=>true]) !!}


    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id','Category:') !!}
        {!! Form::select('category_id', array("" => 'Choose an Option') + $category , 0 , ['class'=>'form-control']) !!}
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
@include('include.form_error')
@endsection



