@extends('layouts.admin.main')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Task</h3></div>
                <div class="card-body">
                    <form action="{{route('admin.updateTask',$task->id)}}" method="POST">
                        @csrf
                        @foreach ($errors as $error)
                            {{$error}}
                        @endforeach
                        <div class="form-floating mb-3">
                            <input class="form-control @error('title') is-invalid @enderror" value="{{$task->title}}" id="inputEmail" name="title" type="text" placeholder="name@example.com" />
                            <label for="inputEmail">Title</label>
                            @error('title')
                                {{$message}}
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control @error('description') is-invalid @enderror" value="{{$task->description}}" id="inputEmail" name="description" type="text" placeholder="name@example.com" />
                            <label for="inputEmail">Description</label>
                            @error('description')
                            {{$message}}
                        @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input  class="form-control @error('duedate') is-invalid @enderror" value="{{$task->due_date}}" id="duedate" name="duedate" type="date" placeholder="Due date" />
                            <label for="duedate">Due Date</label>
                            @error('duedate')
                            {{$message}}
                        @enderror
                        </div>

                        <div class="form-floating mb-3">
                            {{-- <input class="form-control" id="inputEmail" type="text" placeholder="name@example.com" />
                            <label for="inputEmail">Assigned to</label> --}}
                            <select name="status" class="form-select">
                                @foreach ($users as $user)
                                    <option {{$task->user_id==$user->id ? 'selected' : '' }} value="{{$user->id}}">{{$user->username}}</option>
                                @endforeach
                              </select>

                              {{-- <select name="hotelSelect" class="form-select"> --}}

                                {{-- Show all hotels --}}
                                {{-- @foreach($hotels as $hotel)
                                <option {{ $room->hotel_id == $hotel->id ? 'selected' : '' }}
                                    value="{{$hotel->id}}">{{$hotel->name}}</option>
                                @endforeach
                            </select> --}}
                        </div>

                    
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button class="btn btn-primary btn-block">Update Task</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection