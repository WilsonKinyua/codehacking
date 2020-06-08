@extends('layouts.admin')


@section('content')

<div class="row">
    @include('include.flash_message')
<div class="col-sm-6">

    {!! Form::open(["method"=>"POST", "action"=>"AdminCategoriesController@store", "files"=>true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Category Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    
</div>
    <div class="col-sm-6">
<table class="table table-hover table-bordered">
 
    <thead>
        <tr>
            <th>Id</th>
            <th>Category</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Edit Category</th>
            <th>Delete Category</th>
        </tr>
    </thead>
    <tbody>
        @if ($categories)
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->created_at->diffForHumans()}}</td>
            <td>{{$category->updated_at->diffForHumans()}}</td>
            <td><a href="{{'/admin/categories/' . $category->id . "/edit"}}"><input type="button" class="btn btn-primary" value="Edit category"></a></td>
            <td>

                {!! Form::open(['method'=>'DELETE', "action"=>['AdminCategoriesController@destroy',$category->id], 'files'=>true]) !!}
                {!! Form::submit('Delete category', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}

             </td>
        </tr>
        @endforeach
        @endif
       
    </tbody>
</table>
</div>
</div>
@endsection