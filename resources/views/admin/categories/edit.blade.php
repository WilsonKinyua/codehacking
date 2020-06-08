@extends("layouts.admin")


@section('content')

<div class="row">
<div class="col-lg-6">
{!! Form::model($categories, ['method'=>'PATCH', 'action'=> ['AdminCategoriesController@update', $categories->id],'files'=>true ]) !!}

<h1>Edit Category : <b>{{$categories->name}}</b></h1>
    <div class="form-group">
        {!! Form::label('name', 'Category Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::submit('Edit Category', ['class'=>'btn btn-primary']) !!}
    </div>


 {!! Form::close() !!}
</div>
</div>

@endsection

