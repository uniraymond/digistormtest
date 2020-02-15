@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create User - {{ $user->name }} Extra Contact</div>
                    <div class="card-body">
                        <form action="/user/{{ $user->id }}/phone" method="post" class="">
                            @csrf
                            <div class="row">
                                <div class="col-9 mb-2">
                                    <div class="input-group">
                                        <label class="col-4" for="phone_type">Phone Type</label>
                                        <input class="input form-control" name="phone_type" value="" />

                                    </div>
                                </div>
                                <div class="col-9 mb-2">
                                    <div class="input-group">
                                        <label class="col-4" for="phone_number">Phone Number </label>
                                        <input class="input form-control" name="phone_number" value="" />

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
