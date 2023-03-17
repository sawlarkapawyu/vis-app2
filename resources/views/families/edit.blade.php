@extends('layouts.admin')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-bottom-primary">
            <div class="card-header">
                <div class="float-left">
                    <h3 class="m-0 font-weight-bold text-primary">{{ __('family.edit_title') }}</h3>
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

            <form method="post" action="{{route('families.update', ['lang'=>app()->getLocale(), $families->id] )}}" enctype="multipart/form-data">

            @csrf
            @method('POST')

            <div class="card-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.name') }}:</strong>
                            <input type="text" name="name" value="{{ $families->name }}" class="form-control" placeholder="{{ __('family.name') }}">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group"> 
                            <strong>{{ __('family.household_id') }}:</strong>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="house_hold_id">
                                    <option value="">{{ __('action.choose') }} ...</option>
                                    @foreach($households as $household)
                                    <option value="{{$household->household_id}}" @if($household->household_id == $families->house_hold_id){{'selected'}} @endif>{{$household->household_id}}</option>
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
                            <strong>{{ __('family.dob') }}:</strong>
                            <input value="{{$families->date_of_birth}}" type="date" name="date_of_birth" class="form-control">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.nrc') }}:</strong>
                            <input type="text" name="nrc" value="{{ $families->nrc_id }}" class="form-control" placeholder="{{ __('family.nrc') }}">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.father_name') }}:</strong>
                            <input type="text" name="father_name" value="{{ $families->father_name }}" class="form-control" placeholder="{{ __('family.father_name') }}">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.mother_name') }}:</strong>
                            <input type="text" name="mother_name" value="{{ $families->mother_name }}" class="form-control" placeholder="{{ __('family.mother_name') }}">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group"> 
                            <strong>{{ __('family.relationship') }}:</strong>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="relationship">
                                    <option value="">{{ __('action.choose') }} ...</option>
                                    @foreach($relationships as $relationship)
                                    <option value="{{$relationship->name}}" @if($relationship->name == $families->relationship_id){{'selected'}} @endif>{{$relationship->name}}</option>
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
                            <strong>{{ __('family.occuption') }}:</strong>
                            <input type="text" name="occuption" value="{{ $families->occuption }}" class="form-control" placeholder="{{ __('family.occuption') }}">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.gender') }}:</strong><br>
                            <input type="radio" class="px-2" name="gender" value="ကျား"  {{ ($families->gender=="ကျား")? "checked" : "" }} >{{ __('family.male') }}</label>
                            <input type="radio" class="px-2" name="gender" value="မ" {{ ($families->gender=="မ")? "checked" : "" }} >{{ __('family.female') }}</label>
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.religion') }}:</strong><br>
                            <input type=radio name="religion" value="ဗုဒ္ဓဘာသာ" {{ ($families->religion=="ဗုဒ္ဓဘာသာ")? "checked" : "" }}>{{ __('family.Buddhism') }}  
                            <input type=radio name="religion" value="ခရစ်ယာန်ဘာသာ" {{ ($families->religion=="ခရစ်ယာန်ဘာသာ")? "checked" : "" }}>{{ __('family.Christianity') }}  
                            <input type=radio name="religion" value="အစ္စလာမ်ဘာသာ" {{ ($families->religion=="အစ္စလာမ်ဘာသာ")? "checked" : "" }}>{{ __('family.Islam') }}  
                            <input type=radio name="religion" value="ဟိန္ဒူဘာသာ" {{ ($families->religion=="ဟိန္ဒူဘာသာ")? "checked" : "" }}>{{ __('family.Hinduism') }}   
                            <input type=radio name="religion" value="နတ်" {{ ($families->religion=="နတ်")? "checked" : "" }}>{{ __('family.Spiritual') }}  
                            <input type=radio name="religion" value="အခြား" {{ ($families->religion=="အခြား")? "checked" : "" }}>{{ __('family.Others') }} 
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group"> 
                            <strong>{{ __('family.ethnicity') }}:</strong>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="ethnicity">
                                    <option value="">Choose...</option>
                                    @foreach($ethnicities as $ethnicity)
                                    <option value="{{$ethnicity->name}}" @if($ethnicity->name == $families->ethnicity_id){{'selected'}} @endif>{{$ethnicity->name}}</option>
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
                            <strong>{{ __('family.education') }}:</strong>
                            <input type="text" name="education" value="{{ $families->education }}" class="form-control" placeholder="{{ __('family.education') }}">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group"> 
                            <strong>{{ __('family.nationality') }}:</strong>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="nationality">
                                    <option value="">{{ __('action.choose') }} ...</option>
                                    @foreach($nationalities as $nationality)
                                    <option value="{{$nationality->name}}" @if($nationality->name == $families->nationality_id){{'selected'}} @endif>{{$nationality->name}}</option>
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
                            <strong>{{ __('family.remark') }}:</strong>
                            <textarea rows="1" required class="form-control" value="{{ $families->remark }}" name="remark" placeholder="{{ __('family.remark') }}" >{{ $families->remark }}</textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="float-left">
                                <button type="submit" class="btn btn-primary"><i class='fa fa-save' style='color: white'></i> {{ __('action.update') }}</button>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('families.index', app()->getLocale() ) }}"> <i class='fa fa-reply' style='color: white'></i> {{ __('action.back') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush