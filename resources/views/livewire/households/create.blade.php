@extends('layouts.app')
@section('content')

<div>
    <h1>Laravel 9 Livewire Dependant Dropdown - Tutsmake.com</h1>
    <div class="form-group row">
        <label for="state" class="col-md-4 col-form-label text-md-right">State</label>
        <div class="col-md-6">
            <select wire:model="selectedState" class="form-control">
                <option value="" selected>Choose state</option>
                @foreach($state_regions as $state_reion)
                    <option value="{{ $state_reion->id }}">{{ $state_reion->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
   
    @if (!is_null($selectedStateRegion))
        <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
   
            <div class="col-md-6">
                <select class="form-control" name="city_id">
                    <option value="" selected>Choose city</option>
                    @foreach($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</div>

@endsection