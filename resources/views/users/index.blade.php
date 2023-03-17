@extends('layouts.admin')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-bottom-primary">
            <div class="card-header">
                <div class="float-left">
                    <h3 class="m-0 font-weight-bold text-primary">{{ __('admin.user') }}</h3>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('users.create', app()->getLocale() )  }}"> Create New User</a>
                </div>
            </div>

            <div class="card-body">
                @include('flash_message')

                <div class="table-responsive col-xs-12 col-sm-12 col-md-12">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th class="text-center">Roles</th>
                            <th width="280px" class="text-center">Action</th>
                        </tr>
                        @if($data->count()>0)
                            @foreach ($data as $key => $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <span class="badge rounded-pill btn btn-dark">{{ $v }}</span>
                                        @endforeach
                                    @endif    
                                </td>
                                <td class="text-center col-xs-1 col-sm-1 col-md-1">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <a class="btn btn-info btn-sm text-white" href="{{ route('users.show', ['lang'=>app()->getLocale(), 'id'=>$user->id] ) }}"><i class="fas fa-solid fa-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <a class="btn btn-primary btn-sm" onclick="return confirm('Are you sure?');" href="{{ route('users.edit', ['lang'=>app()->getLocale(), $user->id] ) }}"><i class="fas fa-solid fa-edit"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <!-- Start Delete -->
                                                <form method="post" action="{{ route('users.destroy', ['lang'=>app()->getLocale(), 'id'=>$user->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                    <input type="hidden" class="btn btn-danger" value="{{ __('action.delete') }}" onclick="return confirm('Are you sure?');" />
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');"><i class="fas fa-solid fa-trash"></i></button>
                                                </form>
                                                <!-- End Delete   --> 
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                        <tr>
                            <th colspan="6" class="text-center">No Users</th>
                        </tr>
                        @endif
                    </table>
                    <div class="d-flex pagination justify-content-center">
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

