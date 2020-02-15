@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">User Dashboard</div>

                    @if ($user && $user->Profile)

                        <div class="card-header">User Profile <a href="/user/{{ $user->id }}/edit" class="">Edit Profile</a></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="my-0">Full Name:</h6> {{ $user->Profile->fname . ' ' . $user->Profile->lname }}
                                </div>
                                <div class="col-6">
                                    <h6 class="my-0">Date of Birth:</h6> {{ $user->Profile->dob }}
                                </div>
                                <div class="col-6">
                                    <h6 class="my-0">Company:</h6> {{ $user->Profile->company}}
                                </div>
                                <div class="col-6">
                                    <h6 class="my-0">position:</h6> {{ $user->Profile->position}}
                                </div>
                                <div class="col-6">
                                    <h6 class="my-0">Main Phone:</h6> {{ $user->Profile->phone}}
                                </div>
                                <div class="col-6">
                                    <h6 class="my-0">Main Address:</h6> {{ $user->Profile->address}}<br>
                                    {{ $user->Profile->region}},
                                    {{ $user->Profile->suburb}},<br>
                                    {{ $user->Profile->state}},
                                    {{ $user->Profile->postcode}},
                                    {{ $user->Profile->country}}<br>
                                </div>
                            </div>
                            <hr>
                            @if ($user->Phone)
                                @foreach($user->Phone as $phone)
                                    <div class="col-6">
                                        <h6 class="my-0">Extra Phone Numbers:</h6>
                                        <div><h6 class="my-0">Phone Type:</h6> {{ $phone->phone_type }}</div>
                                        <div><h6 class="my-0">Phone Number: </h6>{{ $phone->phone_number }}</div>
                                        <div>
                                            <form method="post" action="/user/{{$user->id}}/phone/{{$phone->id}}">
                                                @csrf
                                                @method('delete')
                                                <input class="btn btn-danger btn-sm" value="Remove Phone" type="submit">
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            @if ($user->Address)
                                <hr>
                                @foreach($user->Address as $address)
                                    <div class="col-6">
                                        <h6 class="my-0">Extra Address:</h6>
                                        {{ $address->address}}<br>
                                        {{ $address->region}},
                                        {{ $address->suburb}},<br>
                                        {{ $address->state}},
                                        {{ $address->postcode}},
                                        {{ $address->country}}<br>
                                    </div>
                                    <div>
                                        <form method="post" action="/user/{{$user->id}}/address/{{$address->id}}">
                                            @csrf
                                            @method('delete')
                                            <input class="btn btn-danger btn-sm" value="Remove Address" type="submit">
                                        </form>
                                    </div>
                                @endforeach
                            @endif

                            <div class="row">
                                <div class="col-md-4 md-3" >
                                    <a href="/user/{{ $user->id }}/edit" class="">Edit Profile</a>
                                </div>
                                <div class="col-md-4 md-3" >
                                    <a href="/user" class="">Display All Users</a>
                                </div>
                            </div>
                        </div>
                    @elseif ($user)
                        <div>
                            <form action="/user/{{ $user->id }}/profile" method="post" class="needs-validation">
                                @csrf
                                @method('patch')

                                <div class="row">
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="fname">First Name </label>
                                            <input class="input form-control" name="fname" value="" />

                                        </div>
                                    </div>
                                    <div class=" col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="lname">Last Name </label>
                                            <input class="input form-control" name="lname" value="" />
                                        </div>
                                    </div>
                                    <div class=" col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="dob"> Date of Birth </label>
                                            <input class="input form-control" name="dob" value="" />
                                        </div>
                                    </div>
                                    <div class=" col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="company">Company </label>
                                            <input class="input form-control" name="company" value="" />

                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="position">Position </label>
                                            <input class="input form-control" name="position" value="" />

                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="phone">Phone </label>
                                            <input class="input form-control" name="phone" value="" />

                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="address">Address </label>
                                            <input class="input form-control" name="address" value="" />

                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="region">Region </label>
                                            <input class="input form-control" name="region" value="" />

                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="suburb">Suburb </label>
                                            <input class="input form-control" name="suburb" value="" />

                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="state">State </label>
                                            <input class="input form-control" name="state" value="" />
                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="postcode">PostCode </label>
                                            <input class="input form-control" name="postcode" value="" />
                                        </div>
                                    </div>
                                    <div class="col-9 mb-2">
                                        <div class="input-group">
                                            <label class="col-4" for="country">Country </label>
                                            <input class="input form-control" name="country" value="" />
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
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
