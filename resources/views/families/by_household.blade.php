@extends('layouts.admin')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-bottom-primary">
            <div class="card-header">
                <div class="float-left">
                    <h3 class="m-0 font-weight-bold text-primary">{{ __('family.by_household') }}</h3>
                </div>
                <div class="float-right ml-1">
                    <a class="btn btn-primary" href="{{ route('families.index', app()->getLocale() ) }}">All Family Information</a>
                </div>
                <div class="float-right ml-1">
                    <a class="btn btn-primary" href="{{ route('families.create', app()->getLocale() ) }}">{{ __('action.create') }}</a>
                </div>
            </div>

            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                
                <!-- Table -->
                <div class="table-responsive">
                    
                    <table class="table table-hover" id="dataTable2" width="100%" cellspacing="0">
                        <thead>    
                            <tr>
                                <th class="align-middle text-center">{{ __('family.no') }}</th>
                                <th class="align-middle text-center">{{ __('family.name') }}</th>
                                <th class="align-middle text-center">{{ __('family.dob') }}</th>
                                <th class="align-middle text-center">Years</th>
                                <th class="align-middle text-center">{{ __('family.gender') }}</th>
                                <th class="align-middle text-center">{{ __('family.father_name') }}</th>
                                <th class="align-middle text-center">{{ __('family.relationship') }}</th>
                                <th class="align-middle text-center">{{ __('family.nrc') }}</th>
                                <th class="align-middle text-center">{{ __('family.ethnicity') }}</th>
                                <th class="align-middle text-center">{{ __('family.religion') }}</th>
                                <th class="align-middle text-center">{{ __('family.household_id') }}</th>
                                <th class="align-middle text-center">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>   
                            @if(count($families) > 0)
                                @foreach ($families as $i=>$family)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $family->name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($family->date_of_birth)) }}</td>
                                    <td>
                                    @php
                                        $birthday = $family->date_of_birth;
                                        $age = Carbon\Carbon::parse($birthday)->diff(Carbon\Carbon::now())->format('%y');
                                    @endphp
                                    {{$age}}
                                    </td>
                                    <td>{{ $family->gender }}</td>
                                    <td>{{ $family->father_name }}</td>
                                    <td>{{ $family->relationship_id }}</td>
                                    <td>{{ $family->nrc_id }}</td>
                                    <td>{{ $family->ethnicity_id }}</td>
                                    <td>{{ $family->religion }}</td>
                                    <td>{{ $family->house_hold_id }}</td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <a class="btn btn-info text-white" href="{{ route('families.show', ['lang'=>app()->getLocale(), $family->id]) }}"><i class="fas fa-solid fa-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <a class="btn btn-primary" onclick="return confirm('Are you sure?')" href="{{ route('families.edit', ['lang'=>app()->getLocale(), $family->id] ) }}"><i class="fas fa-solid fa-edit"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <!-- Start Delete -->
                                                    <form method="post" action="{{ route('families.destroy', ['lang'=>app()->getLocale(), $family->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                        <input type="hidden" class="btn btn-danger" value="{{ __('action.delete') }}" onclick="return confirm('Are you sure?');" />
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');"><i class="fas fa-solid fa-trash"></i></button>
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
                                    <th colspan="17" class="text-center">No Family</th>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#dataTable2').DataTable();
    });
</script> 

@endsection