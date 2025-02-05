@extends('layouts.admin.main')


@section('main-content')

{{-- <h2>Profile Information</h2>
<p>Update your account's profile information and email address.</p> --}}
{{-- 
<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
    @method('patch')
    <div class="col-md-6">
        <div class="form-floating">
            <input class="form-control @error('name') is-invalid  @enderror"
                name="name" value="{{old('name')}}" id="inputName" type="text"
                placeholder="Enter your name" />
            <label for="inputName">Last name</label>
            @error('name')
            {{$message}}
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-floating">
            <input class="form-control @error('email') is-invalid  @enderror"
                name="email" value="{{old('email')}}" id="email" type="email"
                placeholder="Enter your last name" />
            <label for="email">Email</label>
            @error('Email')
            {{$message}}
            @enderror
        </div>
    </div>
</form> --}}

{{-- @include('profile.partials.update-profile-information-form')

@include('profile.partials.update-password-form') --}}

@include('pages.admin.profile.partials.delete-user-form')
@endsection