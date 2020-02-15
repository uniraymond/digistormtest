@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">

                    @if ($user->Profile)

                        <div class="card-header">Edit User Profile - {{ $user->name }}</div>
                        <div class="card-body">
                        <form action="/user/{{ $user->id }}/profile" method="post" class="needs-validation">
                            @csrf
                            @method('patch')

                            <div class="row">
                                <div class="col-9 mb-2">
                                    <div class="input-group">
                                        <label class="col-4" for="fname">First Name </label>
                                        <input class="input form-control" name="fname" value="{{ $user->Profile->fname }}" required />

                                    </div>
                                </div>
                                    <div class=" col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="lname">Last Name </label>
                                            <input class="input form-control" name="lname" value="{{ $user->Profile->lname }}" required/>
                                        </div>
                                    </div>
                                    <div class=" col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="dob"> Date of Birth </label>
                                            <input class="input form-control" name="dob" value="{{ $user->Profile->dob }}" required/>
                                        </div>
                                    </div>
                                    <div class=" col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="company">Company </label>
                                                <input class="input form-control" name="company" value="{{ $user->Profile->company }}" required />

                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="position">Position </label>
                                                <input class="input form-control" name="position" value="{{ $user->Profile->position }}" required/>

                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="phone">Phone </label>
                                                <input class="input form-control" name="phone" value="{{ $user->Profile->phone }}" required/>

                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="address">Address </label>
                                                <input class="input form-control" name="address" value="{{ $user->Profile->address }}" required/>

                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="region">Region </label>
                                                <input class="input form-control" name="region" value="{{ $user->Profile->region }}" required/>

                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="suburb">Suburb </label>
                                                <input class="input form-control" name="suburb" value="{{ $user->Profile->suburb }}" required/>

                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="state">State </label>
                                            <input class="input form-control" name="state" value="{{ $user->Profile->state }}" required/>
                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="postcode">PostCode </label>
                                            <input class="input form-control" name="postcode" value="{{ $user->Profile->postcode }}" required/>
                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="country">Country </label>
                                            <input class="input form-control" name="country" value="{{ $user->Profile->country }}" required/>
                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <div class="col-12">
                                                <input type="submit" class="btn btn-dark" value="Submit" />
                                                <a href="/user/{{ $user->id }}/info" class="btn btn-light">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </form>

                            <a class="button-primary btn" href="/user/{{$user->id}}/phone/create">Add New Phone</a>
                            <a class="button-primary btn" href="/user/{{$user->id}}/address/create">Add New Address</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
