@extends('layouts.admin')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-bottom-primary">
            <div class="card-header">
                    <div class="float-left">
                        <h3 class="m-0 font-weight-bold text-primary">{{ __('family.show_title') }}</h3>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('families.index', app()->getLocale() ) }}"><i class='fa fa-reply' style='color: white'></i> {{ __('action.back') }}</a>
                    </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.state_region') }}:</strong>
                            {{ $families->household->state_region->name  }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.household_id') }}:</strong>
                            {{ $families->house_hold_id }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.district') }}:</strong>
                            {{ $families->household->district->name  }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.house_number') }}:</strong>
                            {{ $families->household->house_number  }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.township') }}:</strong>
                            {{ $families->household->township->name  }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.date') }}:</strong>
                            {{ $families->household->date  }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.ward_village_tract') }}:</strong>
                            {{ $families->household->wardvillagetract->name  }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.family_head') }}:</strong>
                            {{ $families->household->family_head  }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('household.village') }}:</strong>
                            {{ $families->household->village->name  }}
                        </div>
                    </div>
                    
                    <hr class="sidebar-divider text-gray-500">

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.name') }}:</strong>
                            {{ $families->name }}
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.dob') }}:</strong>
                            {{ date('d-m-Y', strtotime($families->date_of_birth)) }}
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.gender') }}:</strong>
                            {{ $families->gender }}
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.father_name') }}:</strong>
                            {{ $families->father_name }}
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.mother_name') }}:</strong>
                            {{ $families->mother_name }}
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.nrc') }}:</strong>
                            {{ $families->nrc_id }}
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.relationship') }}:</strong>
                            {{ $families->relationship_id }}
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.occuption') }}:</strong>
                            {{ $families->occuption }}
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.education') }}:</strong>
                            {{ $families->education }}
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.ethnicity') }}:</strong>
                            {{ $families->ethnicity_id }}
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.nationality') }}:</strong>
                            {{ $families->nationality_id }}
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.religion') }}:</strong>
                            {{ $families->religion }}
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.remark') }}:</strong>
                            {{ $families->remark }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection