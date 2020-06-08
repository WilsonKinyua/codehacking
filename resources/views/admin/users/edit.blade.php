@extends('layouts.admin')


@section('content')
<div class="row">

    <div class="col-sm-3">
        
     <img src="{{$user->photo ? $user->photo->file : "http://placehold.it/400x400"}}" alt="" class="img-responsive img-rounded">

    </div>
<div class="col-sm-9">
        {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['AdminUsersController@update',$user->id],'files'=>true]) !!}

            <h1>Edit User <b>Username: </b> {{$user->name}}</h1>
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', [""=>"Choose Option"] + $roles , null , ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active','Status:') !!}
                {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null , ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo: ') !!}
                {!! Form::file('photo_id', null , ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-4']) !!}
            </div>

        {!! Form::close() !!}
        <div class="form-group">
                    
            {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminUsersController@destroy',$user->id]]) !!}
                    
            {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-4 pull-right']) !!}
            
            {!! Form::close() !!}
        </div>

    {{-- ======== Displaying errors on the form  ==== --}}

    @include('include.form_error')
    @include('include.flash_message')
</div>
</div>
    
@endsection