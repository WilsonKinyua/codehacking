@extends('layouts.admin')


@section('content')


    <h1>Media Page</h1>

    <table class="table table-hover ">
        @include('include.flash_message')
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Created At</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        @if ($photos)
        @foreach ($photos as $photo)
        <tr>
            <td>{{$photo->id}}</td>
            <td><img width="50" src="{{$photo->file ? $photo->file : "No photo at the moment"}}" alt="" class="img-rounded"></td>
            <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : "No Date"}}</td>
            <td>
                {!! Form::open(['method'=>'DELETE', "action"=>['AdminMediaController@destroy',$photo->id], 'files'=>true]) !!}
                {!! Form::submit('Delete Photo', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}

             </td>
       </tr>
        @endforeach
        @endif

        </tbody>
    </table>
    
@endsection