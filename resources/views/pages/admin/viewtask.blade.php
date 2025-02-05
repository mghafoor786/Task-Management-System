@extends('layouts.admin.main')

@section('main-content')

<div class="mx-5 my-5">
    <h5>Title : </h5>{{$task->title}}
    <h5 class="mt-4">Description : </h5>{{$task->description}}
    <h5 class="mt-4">status : </h5>{{$task->status}}
    <h5 class="mt-4">Username : </h5>{{$task->user->username}}
</div>

@endsection