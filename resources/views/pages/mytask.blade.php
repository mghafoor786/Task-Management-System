@extends('layouts.main')


@section('main-content')
<div class="mt-5 mx-5">
    <h3 class="my-4">All Tasks(count)</h3>
    <table class="table table-bordered">
        <thead>
                <h1></h1>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($tasks as $task)

            <tr>
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->status}}</td>
                <td><a class="btn btn-primary" href="{{route('user.editUserTask',$task->id)}}">Edit</a></td>
            </tr>
            @endforeach
       
        </tbody>
    </table>
</div>
@endsection