@extends('layouts.admin')

@section('css')
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-bottom-primary">
            <div class="card-header">
                <div class="float-left">
                    <h3 class="m-0 font-weight-bold text-primary">Death Records</h3>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('families.index', app()->getLocale() ) }}"> <i class="fas fa-solid fa-reply"></i> {{ __('action.back') }}</a>
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
                    
                        
                    <table class="table table-hover" id="filterTable" width="100%" cellspacing="0">
                        <thead>    
                            <tr>
                            <th class="align-middle text-center">No</th>
                                <th class="align-middle text-center">Date</th>
                                <th class="align-middle text-center">Complainant</th>
                                <th class="align-middle text-center">Name</th>
                                <th class="align-middle text-center">death_date</th>
                                <th class="align-middle text-center">death_place</th>
                                <th class="align-middle text-center">Gender</th>
                                <th class="align-middle text-center">Age</th>
                                <th class="align-middle text-center">NRC</th>
                                <th class="align-middle text-center">Township</th>
                                <th class="align-middle text-center">Ward/Village Tract</th>
                                <th class="align-middle text-center">Village</th>
                            </tr>
                        </thead>

                        @php
                        $i=1;
                        @endphp
                        <tbody>  
                            @foreach($data as $row)
                            
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ date('d-m-Y', strtotime($row->date)) }}</td>
                                <td>{{ $row->complainant }}</td>
                                <td>{{ $row->family_name }}</td>
                                <td>{{ date('d-m-Y', strtotime($row->death_date)) }}</td>
                                <td>{{ $row->death_place }}</td>
                                <td>{{ $row->gender }}</td>
                                <td>
                                    @php
                                        $birthday = $row->date_of_birth;
                                        $age = Carbon\Carbon::parse($birthday)->diff(Carbon\Carbon::now())->format('%y');
                                    @endphp
                                    {{$age}}
                                </td>
                                <td>{{ $row->nrc }}</td>
                                <td>{{$row->township}}</td>
                                <td>{{$row->wardvillage}}</td>
                                <td>{{$row->village}}</td>
                            </tr>
                            
                            @php
                            $i++;
                            @endphp
                            @endforeach
                            
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
        $('#filterTable').DataTable();
    });
</script>

@endsection