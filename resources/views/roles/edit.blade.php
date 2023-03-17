@extends('layouts.admin')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-bottom-primary">
            <div class="card-header">
                <div class="float-left">
                    <h3 class="m-0 font-weight-bold text-primary">Edit Role</h3>
                </div>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
            {!! Form::model($role, ['method' => 'PUT','route' => ['roles.update', ['lang'=>app()->getLocale(), $role->id] ]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="float-left">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('roles.index', app()->getLocale() ) }}"> Back</a>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
