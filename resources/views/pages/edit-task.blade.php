@extends('layouts.main')


@section('main-content')
<div class="container m-5">
    <h3>Title : {{$task->title}}</h3>
    <h6>Description : {{$task->description}}</h6>



<form action="{{route('user.updateStatus',$task->id)}}" method="POST">
    @csrf
    <div class="col-md-6">
        <div class="form-floating">
            <select name="status" class="form-select">
                <option selected value="{{$task->id}}">{{$task->status}}</option>
                @if ($task->status=='In_Progress')
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
                @endif

                @if ($task->status=='Completed')
                <option value="Pending">Pending</option>
                <option value="In_Progress">In_Progress</option>
                @endif

                @if ($task->status=='Pending')
                <option value="In_Progress">In_Progress</option>
                <option value="Completed">Completed</option>
                @endif
              </select>
            <label for="inputLastName">Select</label>

        </div>
    </div>
    <button class="btn btn-primary">Update</button>
</form>
</div>
@endsection