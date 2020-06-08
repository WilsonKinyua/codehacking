@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="{{asset('css/dropzone.css')}}">

    
@endsection

@section('content')


    <h1>Create Media Page</h1>

    {!! Form::open(["method"=>"POST", "action"=>"AdminMediaController@store", "class"=>'dropzone']) !!}


    {!! Form::close() !!}
   
    
@endsection


@section('footer')


<script src="{{asset('js/dropzone.js')}}"></script>
    
@endsection