@extends('layouts.admin.main')


@section('main-content')
<div class="mt-5 mx-5">
    <h3 class="my-4">Admin</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Assigned To</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admin as $a)
            <tr>
                <th scope="row">1</th>
                <td>{{$a->first_name}}</td>
                <td>{{$a->last_name}}</td>
                <td>{{$a->email}}</td>
                <td>DB</td>
                <td><button class="btn btn-primary">Edit</button></td>
                <td><button class="btn btn-danger">Delete</button></td>
                
            </tr>
            @endforeach
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>@fat</td>
                <td><button class="btn btn-primary">Edit</button></td>
                <td><button class="btn btn-danger">Delete</button></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection