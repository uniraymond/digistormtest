@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Dashboard - @if ($user->Profile) {{$user->Profile->fname . ' ' . $user->Profile->lname}} @endif</div>

                    @if ($user->Profile)

                        <div class="card-header">User Profile</div>
                        <div class="card-body">
                            <div class="col-md-6">
                                {{ $user->Profile->fname }} {{ $user->Profile->lname }}
                            </div>
                            <div class="col-md-6">
                                {{ $user->Profile->dob }}
                            </div>
                            <div class="col-md-6">
                                {{ $user->Profile->fname }}
                            </div>
                            <div class="col-md-6">
                                {{ $user->Profile->fname }}
                            </div>


                            <div class="edit" >
                                <a href="/user/{{ $user->id }}/edit" class="">Edit Profile</a>
                            </div>
                        </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
