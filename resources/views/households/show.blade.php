@extends('layouts.admin')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-bottom-primary">
            <div class="card-header">
                    <div class="float-left">
                        <h3 class="m-0 font-weight-bold text-primary">{{ __('household.show_title') }}</h3>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('households.index', app()->getLocale() ) }}"><i class='fa fa-reply' style='color: white'></i> {{ __('action.back') }}</a>
                    </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.household_id') }}:</strong>
                            {{ $households->household_id }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.house_number') }}:</strong>
                            {{ $households->house_number }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.family_head') }}:</strong>
                            {{ $households->family_head }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.state_region') }}:</strong>
                            {{ $households->state_region->name }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.district') }}:</strong>
                            {{ $households->district->name }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.township') }}:</strong>
                            {{ $households->Township->name }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.ward_village_tract') }}:</strong>
                            {{ $households->wardvillagetract->name }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.village') }}:</strong>
                            {{ $households->village->name }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.date') }}:</strong>
                            {{ $households->date }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection