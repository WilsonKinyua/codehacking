@extends('layouts.admin')

@section('content')


<h1 class="text-center text-uppercase">Users Page</h1>
    <div class="row">
        <div class="col-lg-6">

        </div>
                <div class="col-lg-5 col-lg-offset-4 text-center">
                        {{-- =========================To echo errors======= --}}
                @include('include.flash_message')
                </div>
     </div>
<table class="table table-hover">

    <thead>
        <tr>
            <th>Id</th>
            <th>Profile</th>
            <th>Name</th>
            <th>Role</th>
            <th>Status</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Edit User</th>
            <th>Delete User</th>
        </tr>
    </thead>
    <tbody>
        @if ($users)
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td><img height="100px" width="200px" src="{{$user->photo ? $user->photo->file : "http://placehold.it/100x100"}}" alt="" class="img-rounded"></td>
            <td>{{$user->name}}</td>
            <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
             <td><a href="{{'/admin/users/' . $user->id . "/edit"}}"><input type="button" class="btn btn-primary" value="Edit User"></a></td>
            <td>

                {!! Form::open(['method'=>'DELETE', "action"=>['AdminUsersController@destroy',$user->id], 'files'=>true]) !!}
                {!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}



             </td>
        </tr>
        @endforeach
        @endif
       
    </tbody>
</table>



@endsection

