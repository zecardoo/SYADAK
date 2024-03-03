@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <h1>User Profile</h1>
        <hr>
        {{-- @include('flas-massage') --}}

        <form action="/profile/update/{{ $user->id }}" class="formProfile" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')
            <div class="formText">
                <div class=" d-flex flex-column">
                    <label for="" class="text-uppercase fs-5 ps-2">Name</label>
                    <input type="text" autocomplete="off" name="name" placeholder="Name" value="{{ $user->name }}"
                        required>
                </div>

                <div class="d-flex flex-column">
                    <label for="" class="text-uppercase fs-5 ps-2">Email</label>
                    <input id="email" class="@error('email') is-invalid @enderror" type="email" autocomplete="off"
                        name="email" placeholder="Email" value="{{ $user->email }}" required>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <select class="form-select w-25" name="role">
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                    <option value="seller">seller</option>
                </select>
            </div>

            <div class="formBtn"><button type="submit">Save</button></div>

        </form>


    </div>
@endsection
