@extends('layouts.admin.main')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Task</h3></div>
                <div class="card-body">
                    <form action="{{route('admin.addTask')}}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" id="inputEmail" name="title" type="text" placeholder="name@example.com" />
                            <label for="inputEmail">Title</label>
                            @error('title')
                                {{$message}}
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            {{-- <input class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}" id="inputEmail" name="description" type="textarea" placeholder="name@example.com" /> --}}
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <label for="exampleFormControlTextarea1">Description</label>
                            @error('description')
                            {{$message}}
                        @enderror
                        </div>
                        {{-- date --}}

                        <div class="form-floating mb-3">
                            <input  class="form-control @error('duedate') is-invalid @enderror" value="{{old('duedate')}}" id="duedate" name="duedate" type="date" placeholder="Due date" />
                            <label for="duedate">Due Date</label>
                            @error('duedate')
                            {{$message}}
                        @enderror
                        </div>


                        {{-- date --}}

                        <div class="form-floating mb-3">
                            {{-- <input class="form-control" id="inputEmail" type="text" placeholder="name@example.com" />
                            <label for="inputEmail">Assigned to</label> --}}
                            <select name="user" value="{{old('user')}}" class="form-select @error('user') is-invalid @enderror">
                                <option selected disabled>Select Employee</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->first_name." ".$user->last_name}}</option>
                                @endforeach
                              </select>
                              @error('user')
                            {{$message}}
                        @enderror
                        </div>

                    
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button class="btn btn-primary btn-block">Create Task</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection