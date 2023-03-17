@section('css')

<!-- Custom styles for this page -->
@endsection

@extends('layouts.admin')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-bottom-primary">
            <div class="card-header">
                <div class="float-left">
                    <h3 class="m-0 font-weight-bold text-primary">{{ __('household.title') }}</h3>
                </div>
                <div class="float-right">
                    <a class="btn btn-danger ml-1" href="{{ route('households.trashed', app()->getLocale() ) }}"> <i class="fas fa-solid fa-trash"></i> {{ __('admin.deleted_household') }}</a>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary ml-1" href="{{ route('households.create', app()->getLocale() ) }}"> <i class="fas fa-solid fa-plus"></i> {{ __('action.create') }}</a>
                </div>
            </div>

            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="align-middle text-center">{{ __('household.no') }}</th>
                                <th class="align-middle text-center">{{ __('household.household_id') }}</th>
                                <th class="align-middle text-center">{{ __('household.date') }}</th>
                                <th class="align-middle text-center">{{ __('household.house_number') }}</th>
                                <th class="align-middle text-center">{{ __('household.family_head') }}</th>
                                <th class="align-middle text-center">{{ __('household.state_region') }}</th>
                                <th class="align-middle text-center">{{ __('household.district') }}</th>
                                <th class="align-middle text-center">{{ __('household.township') }}</th>
                                <th class="align-middle text-center">{{ __('household.ward_village_tract') }}</th>
                                <th class="align-middle text-center">{{ __('household.village') }}</th>
                                <th class="align-middle text-center">{{ __('household.action') }}</th>
                            </tr>
                        </thead> 
                
                        @php
                        $i=1;
                        @endphp
                        <tbody>  
                            @if(count($households) > 0)
                                @foreach($households as $household)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td class="text-center">{{ $household->household_id }}</td>
                                    <td>{{ $household->date }}</td>
                                    <td>{{ $household->house_number }}</td>
                                    <td>{{ $household->family_head }}</td>
                                    <td>{{ $household->state_region->name }}</td>
                                    <td>{{ $household->district->name }}</td>
                                    <td>{{ $household->township->name }}</td>
                                    <td>{{ $household->wardvillagetract->name }}</td>
                                    <td>{{ $household->village->name }}</td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <a class="btn btn-info text-white btn-sm" href="{{ route('households.show', ['lang'=>app()->getLocale(), $household->household_id]) }}"><i class="fas fa-solid fa-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <a class="btn btn-primary btn-sm" onclick="return confirm('Are you sure?')" href="{{ route('households.edit', ['lang'=>app()->getLocale(), $household->household_id] ) }}"><i class="fas fa-solid fa-edit"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <!-- Start Delete -->
                                                    <form method="post" action="{{ route('households.destroy', ['lang'=>app()->getLocale(), $household->household_id]) }}">
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
                                @php
                                $i++;
                                @endphp
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="11" class="text-center">No Household</th>
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
        $('#dataTable').DataTable();
    });
</script>
@endsection