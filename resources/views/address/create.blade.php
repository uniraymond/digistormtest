@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create User - {{ $user->name }} Extra Address </div>
                    <div class="card-body">
                        <form action="/user/{{ $user->id }}/address" method="post" class="">
                            @csrf
                            <div class="row">
                                <div class="col-9 mb-2">
                                    <div class="input-group">
                                        <label class="col-4" for="address_type">Address Type</label>
                                        <input class="input form-control" name="address_type" value="" />

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
                </div>
            </div>
        </div>
    </div>
@endsection
