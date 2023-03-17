@extends('layouts.admin')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">

        <div class="card border-bottom-primary">
            <div class="card-header">
                <div class="float-left">
                    <h3 class="m-0 font-weight-bold text-primary">{{ __('family.create_title') }}</h3>
                </div>
            </div>
            

            <form method="post" action="{{route('families.store', app()->getLocale() )}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.name') }}:</strong>
                            <input type="text" required class="form-control" name="name" placeholder="{{ __('family.name') }}">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group"> 
                            <strong>{{ __('family.household_id') }}:</strong>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="house_hold_id">
                                    <option value="">{{ __('action.choose') }} ....</option>
                                    @foreach ($households as $household)
                                    <option value="{{$household->household_id}}">
                                        {{$household->household_id}}
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
                            <strong>{{ __('family.dob') }}:</strong>
                            <input required type="date" name="date_of_birth" class="form-control">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.nrc') }}:</strong>
                            <input type="text" required class="form-control" name="nrc" placeholder="၃/ကကရ(နိုင်)၁၂၃၄၅၆">
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.father_name') }}:</strong>
                            <input type="text" required class="form-control" name="father_name" placeholder="{{ __('family.father_name') }}">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.mother_name') }}:</strong>
                            <input type="text" required class="form-control" name="mother_name" placeholder="{{ __('family.mother_name') }}">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group"> 
                            <strong>{{ __('family.relationship') }}:</strong>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="relationship">
                                    <option value="">{{ __('action.choose') }} ....</option>
                                    @foreach ($relationships as $relationship)
                                    <option value="{{$relationship->name}}">
                                        {{$relationship->name}}
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
                            <strong>{{ __('family.occuption') }}:</strong>
                            <input type="text" required class="form-control" name="occuption" placeholder="{{ __('family.occuption') }}">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.gender') }}:</strong><br>
                            <input class="px-2" type=radio name="gender" value="ကျား"> {{ __('family.male') }}
                            <input class="px-2" type=radio name="gender" value="မ"> {{ __('family.female') }}
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>{{ __('family.religion') }}:</strong><br>
                            <input type=radio name="religion" value="ဗုဒ္ဓဘာသာ">{{ __('family.Buddhism') }}  
                            <input type=radio name="religion" value="ခရစ်ယာန်ဘာသာ">{{ __('family.Christianity') }}  
                            <input type=radio name="religion" value="အစ္စလာမ်ဘာသာ">{{ __('family.Islam') }}  
                            <input type=radio name="religion" value="ဟိန္ဒူဘာသာ">{{ __('family.Hinduism') }}   
                            <input type=radio name="religion" value="နတ်">{{ __('family.Spiritual') }}  
                            <input type=radio name="religion" value="အခြား">{{ __('family.Others') }}  
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group"> 
                            <strong>{{ __('family.ethnicity') }}:</strong>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="ethnicity">
                                    <option value="">{{ __('action.choose') }} ....</option>
                                    @foreach ($ethnicities as $ethnicity)
                                    <option value="{{$ethnicity->name}}">
                                        {{$ethnicity->name}}
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
                            <strong>{{ __('family.education') }}:</strong>
                            <input type="text" required class="form-control" name="education" placeholder="{{ __('family.education') }}">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group"> 
                            <strong>{{ __('family.nationality') }}:</strong>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="nationality">
                                    <option value="">{{ __('action.choose') }} ....</option>
                                    @foreach ($nationalities as $nationality)
                                    <option value="{{$nationality->name}}">
                                        {{$nationality->name}}
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
                            <strong>{{ __('family.remark') }}:</strong>
                            <textarea rows="1" required class="form-control" name="remark" placeholder="{{ __('family.remark') }}" > </textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="float-left">
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-primary"><i class='fa fa-save' style='color: white'></i> {{ __('action.submit') }}</button>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('families.index', app()->getLocale() ) }}"><i class='fa fa-reply' style='color: white'></i> {{ __('action.back') }}</a>
                            </div>
                        </div> 
                    </div> 
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush