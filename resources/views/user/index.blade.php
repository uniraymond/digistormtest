@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <lu>
                            @foreach ($users as $user)
                                <li>
                                    {{ isset($user->Profile->fname) ? $user->Profile->fname : '' }}
                                </li>
                            @endforeach
                        </lu>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
