@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@extends('layouts.admin')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <form method="post" action="{{route('households.store', app()->getLocale() )}}" enctype="multipart/form-data">

        @csrf
            <div class="card border-bottom-primary">
                <div class="card-header">
                    <div class="float-left">
                        <h3 class="m-0 font-weight-bold text-primary">{{ __('household.create_title') }}</h3>
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
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>{{ __('household.household_id') }}:</strong>
                                <input type="text" required class="form-control" name="household_id" placeholder="{{ __('household.household_id') }} eg. က-၁၀၀၀">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6"> 
                            <div class="form-group">
                                <strong>{{ __('household.date') }}:</strong>
                                <input required type="date" name="date" class="form-control">
                            </div>
                        </div>
                        
                        
                        
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>{{ __('household.house_number') }}:</strong>
                                <input type="text" required class="form-control" name="house_number" placeholder="{{ __('household.house_number') }}">
                            </div>
                        </div>
                        
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>{{ __('household.family_head') }}:</strong>
                                <input type="text" required class="form-control" name="family_head" placeholder="{{ __('household.family_head') }}">
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group"> 
                                <strong>{{ __('household.state_region') }}:</strong>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="state-region-dropdown" name="stateregion">
                                        <option value="">{{ __('action.choose') }} ....</option>
                                        @foreach ($state_regions as $stateregion)
                                        <option value="{{$stateregion->id}}">
                                            {{$stateregion->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="inputGroupSelect02">{{ __('action.option') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>{{ __('household.district') }}:</strong>
                                <div class="input-group mb-3">
                                    <select id="district-dropdown" class="form-control" name="district">
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="inputGroupSelect02">{{ __('action.option') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>{{ __('household.township') }}:</strong>
                                <div class="input-group mb-3">
                                    <select id="township-dropdown" class="form-control" name="township">
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="inputGroupSelect02">{{ __('action.option') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>{{ __('household.ward_village_tract') }}:</strong>
                                <div class="input-group mb-3">
                                    <select id="ward-dropdown" class="form-control" name="wardvillagetract">
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="inputGroupSelect02">{{ __('action.option') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>{{ __('household.village') }}:</strong>
                                <div class="input-group mb-3">
                                    <select id="village-dropdown" class="form-control" name="village">
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="inputGroupSelect02">{{ __('action.option') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            <div class="float-left">
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-primary"><i class='fa fa-save' style='color: white'></i> {{ __('action.submit') }}</button>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('households.index', app()->getLocale() ) }}"> <i class='fa fa-reply' style='color: white'></i> {{ __('action.back') }}</a>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    $(document).ready(function () {

        /*------------------------------------------
        --------------------------------------------
        State/Region Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#state-region-dropdown').on('change', function () {
            var state_region_id = this.value;
            $("#district-dropdown").html('');
            $.ajax({
                url: "{{url('{lang}/households/fetch-districts')}}",
                type: "POST",
                data: {
                    state_region_id: state_region_id,
                    _token: '{{csrf_token()}}'
                },
            
                dataType: 'json',
                success: function (result) {
                    $('#district-dropdown').html('<option value="">-- {{ __('action.choose') }} --</option>');
                    $.each(result.districts, function (key, value) {
                        $("#district-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });

        /*------------------------------------------
        --------------------------------------------
        District Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#district-dropdown').on('change', function () {
            var district_id = this.value;
            $("#township-dropdown").html('');
            $.ajax({
                url: "{{url('{lang}/households/fetch-townships')}}",
                type: "POST",
                data: {
                    district_id: district_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#township-dropdown').html('<option value="">-- {{ __('action.choose') }} --</option>');
                    $.each(res.townships, function (key, value) {
                        $("#township-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });

        /*------------------------------------------
        --------------------------------------------
        Township Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#township-dropdown').on('change', function () {
            var township_id = this.value;
            $("#ward-dropdown").html('');
            $.ajax({
                url: "{{url('{lang}/households/fetch-ward-village-tract')}}",
                type: "POST",
                data: {
                    township_id: township_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#ward-dropdown').html('<option value="">-- {{ __('action.choose') }} --</option>');
                    $.each(res.ward_village_tracts, function (key, value) {
                        $("#ward-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });

        /*------------------------------------------
        --------------------------------------------
        Ward/VillageTract Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#ward-dropdown').on('change', function () {
            var ward_village_tract_id = this.value;
            $("#village-dropdown").html('');
            $.ajax({
                url: "{{url('{lang}/households/fetch-village')}}",
                type: "POST",
                data: {
                    ward_village_tract_id: ward_village_tract_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#village-dropdown').html('<option value="">-- {{ __('action.choose') }} --</option>');
                    $.each(res.villages, function (key, value) {
                        $("#village-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });

    });
</script>

@endsection
