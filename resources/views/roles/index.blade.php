@extends('layouts.admin')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-bottom-primary">
            <div class="card-header">
                <div class="float-left">
                    <h3 class="m-0 font-weight-bold text-primary">Role Management</h3>
                </div>
                <div class="float-right">
                    @can('role-create')
                    <a class="btn btn-primary" href="{{ route('roles.create', app()->getLocale() ) }}"> Create New Role</a>
                    @endcan
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive col-xs-12 col-sm-12 col-md-12">
                    <table class="table table-hover" width="100%" cellspacing="0">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th class="text-center col-xs-1 col-sm-1 col-md-1">Action</th>
                        </tr>
                        @if($roles->count()>0)
                            @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td class="text-center">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <a class="btn btn-info btn-sm text-white" href="{{ route('roles.show', ['lang'=>app()->getLocale(), 'id'=>$role->id] ) }}"><i class="fas fa-solid fa-eye"></i></a>
                                            </div>
                                        </div>
                                            @can('role-edit')
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <a class="btn btn-primary btn-sm" onclick="return confirm('Are you sure?');" href="{{ route('roles.edit', ['lang'=>app()->getLocale(), 'id'=>$role->id] ) }}"><i class="fas fa-solid fa-edit"></i></a>
                                            </div>
                                        </div>
                                        @endcan
                                        @can('role-delete')
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <!-- Start Delete -->
                                                <form method="post" action="{{ route('roles.destroy', ['lang'=>app()->getLocale(), 'id'=>$role->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                    <input type="hidden" class="btn btn-danger" value="{{ __('action.delete') }}" onclick="return confirm('Are you sure?');" />
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');"><i class="fas fa-solid fa-trash"></i></button>
                                                </form>
                                                <!-- End Delete   --> 
                                            </div>
                                        </div>  
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                        <tr>
                            <th colspan="3" class="text-center">No Role</th>
                        </tr>
                    @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection