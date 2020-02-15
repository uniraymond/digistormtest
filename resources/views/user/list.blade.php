@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">User List:</div>

                    <div class="card-body">
                        @foreach ($users as $user)
                            @if ($user->Profile)
                                <div class="row">
                                    <div class="col-2">
                                        {{ $user->id }}
                                    </div>
                                    <div class="col-4">
                                        <a href="/user/{{$user->id}}/info">{{$user->Profile->fname . ' ' . $user->Profile->lname}}</a>
                                    </div>
                                    <div class="col-3">
                                        <a href="/user/{{$user->id}}/phone/create">Add More Phone number</a>
                                    </div>
                                    <div class="col-3">
                                        <a href="/user/{{$user->id}}/address/create">Add More Address</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center p-5">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
