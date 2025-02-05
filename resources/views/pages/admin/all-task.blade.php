@extends('layouts.admin.main')


@section('main-content')
<div class="mt-5 mx-5">
    <h3 class="my-4">Total Tasks : {{$totalTasks}}</h3>
    {{-- {{date('Y-m-d H:i:s')}} --}}
    {{-- {{date('Y-m-d')}} --}}
    @if (session('addTask'))
    <div class="alert alert-success">
        {{session('addTask')}}
    </div>
    @endif

    @if (session('update'))
    <div class="alert alert-success">
        {{session('update')}}
    </div>
    @endif

    @if (session('delete'))
    <div class="alert alert-danger">
        {{session('delete')}}
    </div>
    @endif
    <table class="table table-bordered">
        <thead>

            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Assigned_To</th>
                <th scope="col">Status</th>
                <th scope="col">Due_Date</th>
                <th scope="col">View</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($tasks as $task)

            <tr>
                <td>{{substr($task->title,0,20)."....."}}</td>
                <td>{{substr($task->description,0,50)."....."}}</td>
                <td>{{$task->user->username ?? 'N/A'}}</td>
                <td>{{$task->status}}</td>
                {{-- <td>{{$task->due_date}}</td>
                <td>@if (date('Y-m-d')>$task->due_date)
                    <p>overdue</p>
                    @endif
                </td> --}}

                <td>
                    {{-- @if (date('Y-m-d')>$task->due_date && $task->status=='Pending')
                    <p class="duedate">{{$task->due_date}}</p>
                    @else
                    {{$task->due_date}}
                    @endif --}}

                    @if (date('Y-m-d')>$task->due_date && $task->status=='Pending')
                    <p class="duedate">{{$task->due_date}}</p>
                    @elseif (date('Y-m-d')>$task->due_date && $task->status=='In_Progress')
                    <p class="duedate">{{$task->due_date}}</p>
                    @else
                    {{$task->due_date}}
                    @endif
                </td>
                {{-- <td><a class="btn btn-success" href="">View</a></td> --}}
                <td><a class="btn btn-success" href="{{route('admin.viewTask',$task->id)}}">View</a></td>
                <td><a class="btn btn-primary" href="{{route('admin.editTask',$task->id)}}">Edit</a></td>
                <td><a class="btn btn-danger" href="{{route('admin.deleteTask',$task->id)}}">Delete</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection


<style>
    .duedate {
        background-color: rgba(255, 0, 0, 0.527);
        border-radius: 15px;
        height: 20px;
        width: 100px;
        text-align: center
    }
</style>