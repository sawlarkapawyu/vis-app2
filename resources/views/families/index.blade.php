@extends('layouts.admin')

@section('css')
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-bottom-primary">
            <div class="card-header">
                <div class="float-left">
                    <h3 class="m-0 font-weight-bold text-primary">{{ __('family.title_family_member_management') }}</h3>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('families.create', app()->getLocale() ) }}"> <i class="fas fa-solid fa-plus"></i> {{ __('action.create') }}</a>
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
                    <div class="col-md-12">
                        <select id="householdFilter" name="householdFilter" class="col-xs-4 col-sm-4 col-md-4" style="padding: 5px 5px; border: 2px solid var(--select-focus); border-radius: inherit;">
                                <option value="">Filter by Household ID</option>
                                @foreach($households as $row)
                                <option val="{{ $row->household_id }}">{{ $row->household_id }}</option>
                                @endforeach
                        </select>
                        
                    </div>

                    <table class="table table-borderless table-sm col-xs-4 col-sm-4 col-md-4">
                        <thead>
                            <tr>
                                <td>{{ __('family.min_age') }}:</td>
                                <td><input type="text" id="min" name="min" placeholder="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>{{ __('family.max_age') }}:</td>
                                <td><input type="text" id="max" name="max" placeholder="" class="form-control"></td>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-hover" id="filterTable" width="100%" cellspacing="0">
                        <thead>    
                            <tr>
                                <th class="align-middle text-center">{{ __('family.no') }}</th>
                                <th class="align-middle text-center">{{ __('family.name') }}</th>
                                <th class="align-middle text-center">{{ __('family.dob') }}</th>
                                <th class="align-middle text-center">{{ __('family.age') }}</th>
                                <th class="align-middle text-center">{{ __('family.gender') }}</th>
                                <th class="align-middle text-center">{{ __('family.father_name') }}</th>
                                <th class="align-middle text-center">{{ __('family.relationship') }}</th>
                                <th class="align-middle text-center">{{ __('family.nrc') }}</th>
                                <th class="align-middle text-center">{{ __('family.ethnicity') }}</th>
                                <th class="align-middle text-center">{{ __('family.religion') }}</th>
                                <th class="align-middle text-center">{{ __('family.household_id') }}</th>
                                <th class="align-middle text-center">{{ __('action.action') }}</th>
                            </tr>
                        </thead>
                        @php
                        $i=1;
                        @endphp
                        <tbody>  
                            @if(count($families) > 0) 
                                @forelse ($families as $family)
                                <tr>
                                    <td class="text-center">{{ $i }}</td>
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
                                    <td class="text-center">{{ $family->house_hold_id }}</td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <a class="btn btn-info text-white btn-sm" href="{{ route('families.show', ['lang'=>app()->getLocale(), 'id'=>$family->id]) }}"><i class="fas fa-solid fa-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <a class="btn btn-primary btn-sm" onclick="return confirm('Are you sure?')" href="{{ route('families.edit', ['lang'=>app()->getLocale(), $family->id] ) }}"><i class="fas fa-solid fa-edit"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                <button type="button" class="btn btn-danger  btn-sm" data-bs-toggle="modal" data-bs-target="#myModal{{ $family->id }}"><i class="fas fa-solid fa-trash"></i></button>
                                                
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Modal Start -->
                                    <div class="modal fade" id="myModal{{ $family->id }}" tabindex="-1" aria-labelledby="" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Death Entry Form</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <b>{{ __('family.name') }}:</b> {{ $family->name }} <br>
                                                    <b>{{ __('family.gender') }}:</b> {{ $family->gender }} <br>
                                                    <b>{{ __('family.age') }}:</b> {{$age}}, <br>
                                                    <b>{{ __('family.occuption') }}:</b> {{ $family->occuption }} <br>
                                                    <b>{{ __('family.religion') }}:</b> {{ $family->religion }} <br>
                                                    <b>{{ __('family.nrc') }}:</b> {{ $family->nrc_id }} <br><br>
                                                    
                                                    <form method="post" action="{{route('families.destroy', ['lang'=>app()->getLocale(), $family->id] )}}" enctype="multipart/form-data">
                                                    @csrf    
                                                    <!-- @method('DELETE') -->
                                                        <div class="mb-3">
                                                            <input required type="hidden" class="form-control" name="family_id" value="{{ $family->id }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <strong>Complainant:</strong>
                                                            <input required type="text" class="form-control" name="complainant">
                                                        </div>
                                                        <div class="mb-3">
                                                            <strong>Death Date:</strong>
                                                            <input required type="date" class="form-control" name="death_date">
                                                        </div>
                                                        <div class="mb-3">
                                                            <strong>Death Place:</strong>
                                                            <textarea required class="form-control" name="death_place"></textarea>
                                                        </div>
                                                        
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-primary"><i class='fa fa-save' style='color: white'></i> {{ __('action.submit') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal End -->

                                </tr>
                                @php
                                $i++;
                                @endphp
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
    $("document").ready(function () {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.childRowImmediate
            }
        }
        $("#filterTable").dataTable({
            "searching": true
        });
      
        //Get a reference to the new datatable
        var table = $('#filterTable').DataTable();

        //Take the category filter drop down and append it to the datatables_filter div. 
        //You can use this same idea to move the filter anywhere withing the datatable that you want.
        $("#filterTable_filter.dataTables_filter").append($("#householdFilter"));
        
        //Get the column index for the Category column to be used in the method below ($.fn.dataTable.ext.search.push)
        //This tells datatables what column to filter on when a user selects a value from the dropdown.
        //It's important that the text used here (Category) is the same for used in the header of the column to filter
        var householdIndex = 10;
        $("#filterTable th").each(function (i) {
            if ($($(this)).html() == "Household") {
                householdIndex = i; return false;
            }
        });

        //Use the built in datatables API to filter the existing rows by the Category column
        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
            var selectedItem = $('#householdFilter').val()
            var household = data[householdIndex];
            if (selectedItem === "" || household.includes(selectedItem)) {
                return true;
            }
            return false;
            }
        );

        //Set the change event for the Category Filter dropdown to redraw the datatable each time
        //a user selects a new filter.
        $("#householdFilter").change(function (e) {
            $($.fn.dataTable.tables( true ) ).css('width', '100%');
            $($.fn.dataTable.tables( true ) ).DataTable().columns.adjust().draw();
            // table.draw();
        });

        table.draw();
    });
  </script>

<script>
    /* Custom filtering function which will search data in column four between two values */
    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        var min = parseInt($('#min').val(), 10);
        var max = parseInt($('#max').val(), 10);
        var age = parseFloat(data[3]) || 0; // use data for the age column
    
        if (
            (isNaN(min) && isNaN(max)) ||
            (isNaN(min) && age <= max) ||
            (min <= age && isNaN(max)) ||
            (min <= age && age <= max)
        ) {
            return true;
        }
        return false;
    });
    
    $(document).ready(function () {

        var table = $('#filterTable').DataTable();
        
        // Event listener to the two range filtering inputs to redraw on input
        $('#min, #max').keyup(function () {
            table.draw();
        });
        
    });
</script>



@endsection