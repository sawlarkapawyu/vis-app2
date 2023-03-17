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
                    <h3 class="m-0 font-weight-bold text-primary">{{ __('household.trashed') }}</h3>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('households.create', app()->getLocale() ) }}"> {{ __('action.create') }}</a>
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
                                    <td>{{ $household->household_id }}</td>
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
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <a class="btn btn-success btn-sm" onclick="return confirm('Are you sure?')" href="{{ route('households.restore', ['lang'=>app()->getLocale(), $household->household_id] ) }}"><i class="fas fa-solid fa-recycle"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" href="{{ route('households.kill', ['lang'=>app()->getLocale(), $household->household_id] ) }}"><i class="fas fa-solid fa-eraser"></i></a>
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