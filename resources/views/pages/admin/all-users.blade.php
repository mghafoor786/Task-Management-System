@extends('layouts.admin.main')


@section('main-content')
<div class="mt-5 mx-5">
    <h3 class="my-4">Total Users : {{$totalusers}}</h3>
    <a class="btn btn-primary mb-2" href="{{route('admin.addUser')}}">Add User</a>
    @if (session('status'))
    <div class="alert alert-danger">
        <p>{{session('status')}}</p>
    </div>
@endif

@if (session('update'))
    <div class="alert alert-success">
        {{session('update')}}
    </div>

    {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session('update')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> --}}
@endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->first_name." ".$user->last_name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>Employee</td>
                <td><a class="btn btn-primary" href="{{route('admin.edit',$user->id)}}">update</a></td>
                {{-- <td><a class="btn btn-danger" href="{{route('admin.delete',$user->id)}}">Delete</a></td> --}}
                <td>
                    <form action="{{route('admin.delete',$user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>{{$users->links('pagination::bootstrap-5')}}</p>
</div>
@endsection