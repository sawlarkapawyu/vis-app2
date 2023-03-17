@extends('layouts.admin')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> {{ __('admin.dashboard') }}</h1>

    <!-- <select  id="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <option value="">By Village</option>
        <option value="">Village 1</option>
        <option value="">Village 2</option>
        <option value="">Village 3</option>
    </select> -->
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <a class="link-light" href="{{ route('households.index', app()->getLocale()) }}">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{ __('admin.household_count') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$household_count}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-home fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <a class="link-light" href="{{ route('families.index', app()->getLocale()) }}">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                {{ __('admin.family_count') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$family_count}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <a class="link-light" href="{{ route('users.index', app()->getLocale()) }}">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                {{ __('admin.user_count') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user_count}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <a class="link-light" href="{{ route('roles.index', app()->getLocale()) }}">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                {{ __('admin.role_count') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$role_count}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row">

    <!-- Gender Pie Chart -->
    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('admin.gender_ratio') }}</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart1"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle" style="color:#0080ff"></i> {{ __('family.male') }}
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle" style="color: #e600e6;"></i> {{ __('family.female') }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Age Pie Chart -->
    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('admin.age_ratio') }}</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart2"></canvas>
                </div>

                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle" style="color:#55552b"></i>{{ __('admin.under_18') }}
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle" style="color:#ff9900"></i>{{ __('admin.18_above') }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Ethnicity Pie Chart -->
    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('admin.ethnicity_ratio') }}</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart3"></canvas>

                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i>  {{ __('family.Karen') }}
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i>  {{ __('family.Mon') }}
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i>  {{ __('family.Burma') }}
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-secondary"></i>  {{ __('family.Rakhine') }}
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i>  {{ __('family.Shan') }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Religion Pie Chart -->
    <div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('admin.religion_ratio') }}</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart4"></canvas>

                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i>  {{ __('family.Shan') }}
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i>  {{ __('family.Christianity') }}
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i>  {{ __('family.Islam') }}
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-secondary"></i>  {{ __('family.Hinduism') }}
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i>  {{ __('family.Spiritual') }}
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-warning"></i>  {{ __('family.Others') }}
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')

<!-- For Gender -->
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart1");
var myPieChart1 = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["ကျား", "မ"],
    datasets: [{
      data: [
        {{$Male_count}},
        {{$Female_count}}
      ],
      backgroundColor: ['#66b3ff', '#ff4dff'],
      hoverBackgroundColor: ['#3399ff', '#e600e6'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

</script>

<!-- For Age -->
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart2");
var myPieChart2 = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Under 18", "18 & Above"],
    datasets: [{
      data: [
        {{$under18}},
        {{$above18}}
      ],
      backgroundColor: ['#bbbb77', '#ffc266'],
      hoverBackgroundColor: ['#55552b', '#ff9900'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

</script>

<!-- For Ethnicity -->
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart3");
var myPieChart3 = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["ကရင်", "မွန်", "ဗမာ", "ရခိုင်", "ရှမ်း"],
    datasets: [{
      data: [
        {{$Karen_count}},
        {{$Mon_count}},
        {{$Burma_count}},
        {{$Rakhaing_count}},
        {{$Shan_count}},
      ],
      backgroundColor: ['#4e73df', '#1cc88a', '#FF0000', '#808080', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#F08080', '#DCDCDC', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

</script>

<!-- For Religion -->
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart4");
var myPieChart4 = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["ဗုဒ္ဓ", "ခရစ်ယာန်", "အစ္စလာမ်", "ဟိန္ဒူ", "နတ်", "အခြား"],
    datasets: [{
      data: [ 
        {{$Buddhism_count}},
        {{$Christianity_count}},
        {{$Islam_count}},
        {{$Hinduism_count}},
        {{$Spiritual_count}},
        {{$Others_count}},
      ],
      backgroundColor: ['#4e73df', '#1cc88a', '#FF0000', '#808080', '#36b9cc', '#FFE4B5'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#F08080', '#DCDCDC', '#2c9faf', '#FFFFE0'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

</script>

@endsection

<!-- Gender Ratio (M/F)
Age Ratio(18 above)
Ethnicity Ratio (count)
Religion Ratio (count) -->