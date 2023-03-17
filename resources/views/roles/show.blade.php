@extends('layouts.admin')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-bottom-primary">
            <div class="card-header">
                <div class="float-left">
                    <h3 class="m-0 font-weight-bold text-primary"> Show Role</h3>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('roles.index', app()->getLocale() ) }}"> Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $role->name }}
                </div>
                <div class="form-group">
                    <strong>Permissions:</strong>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            <label class="label label-success">{{ $v->name }},</label>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection