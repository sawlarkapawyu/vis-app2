@extends('layouts.admin')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-bottom-primary">
            <div class="card-header">
                    <div class="float-left">
                        <h3 class="m-0 font-weight-bold text-primary">Show User</h3>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('users.index', app()->getLocale()) }}">Back</a>
                    </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>ID:</strong>
                            {{ $user->id }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6"> 
                        <div class="form-group">
                            <strong>Username:</strong>
                            {{ $user->username }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Roles:</strong>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <span class="badge rounded-pill btn btn-dark">{{ $v }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Created Date:</strong>
                            {{ $user->created_at }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection