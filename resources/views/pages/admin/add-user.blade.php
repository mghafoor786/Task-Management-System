@extends('layouts.admin.main')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Add User</h3>
                    @if (session('status'))
                    <div class="alert alert-success">
                        <p>{{session('status')}}</p>
                    </div>
                @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.formSubmit') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control @error('first_name') is-invalid @enderror"
                                        value="{{old('first_name')}}" name="first_name" id="inputFirstName" type="text"
                                        placeholder="Enter your first name" />
                                    <label for="inputFirstName">First name</label>
                                    @error('first_name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control @error('last_name') is-invalid  @enderror"
                                        name="last_name" value="{{old('last_name')}}" id="inputLastName" type="text"
                                        placeholder="Enter your last name" />
                                    <label for="inputLastName">Last name</label>
                                    @error('last_name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control @error('email') is-invalid @enderror" name="email"
                                id="inputEmail" value="{{old('email')}}" type="email" placeholder="name@example.com" />
                            <label for="inputEmail">Email address</label>
                            @error('email')
                            {{$message}}
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control @error('username') is-invalid @enderror" id="inputLastName"
                                name="username" value="{{old('username')}}" type="text" placeholder="Enter your Username" />
                            <label for="inputLastName">Username</label>
                            @error('username')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control @error('password') is-invalid @enderror"
                                        id="inputPassword" value="{{old('password')}}" name="password" type="password"
                                        placeholder="Create a password" />
                                    <label for="inputPassword">Password</label>
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control @error('password_confirmation') is-invalid @enderror" id="inputPasswordConfirm" type="password"
                                        name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Confirm password" />
                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                    @error('password_confirmation')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button class="btn btn-primary btn-block">Create Account</button>
                                </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection