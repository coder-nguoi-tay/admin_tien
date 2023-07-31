@extends('layouts.admin')
@section('admin')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thống kê</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Tổng doanh thu</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ number_format(array_sum($totalPrice)) }}đ</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Doanh thu trong ngày</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ number_format(array_sum($totalPriceOnDay)) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số lượng khách hàng
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $TotalUser }}</div>
                                    </div>
                                    {{-- <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Số lượng bài viết</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalJob }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Doanh thu</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <chart-payment
                            :data="{{ json_encode([
                                'countPaymentMoth1' => $countPaymentMoth1 ?? 0,
                                'countPaymentMoth2' => $countPaymentMoth2 ?? 0,
                                'countPaymentMoth3' => $countPaymentMoth3 ?? 0,
                                'countPaymentMoth4' => $countPaymentMoth4 ?? 0,
                                'countPaymentMoth5' => $countPaymentMoth5 ?? 0,
                                'countPaymentMoth6' => $countPaymentMoth6 ?? 0,
                                'countPaymentMoth7' => $countPaymentMoth7 ?? 0,
                                'countPaymentMoth8' => $countPaymentMoth8 ?? 0,
                                'countPaymentMoth9' => $countPaymentMoth9 ?? 0,
                                'countPaymentMoth10' => $countPaymentMoth10 ?? 0,
                                'countPaymentMoth11' => $countPaymentMoth11 ?? 0,
                                'countPaymentMoth12' => $countPaymentMoth12 ?? 0,
                                'payment' => 2,
                            ]) }}">
                        </chart-payment>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Bài viết</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <chart-new-job
                                :data="{{ json_encode([
                                    'countPaymentMoth1' => $countNewMoth1 ?? 0,
                                    'countPaymentMoth2' => $countNewMoth2 ?? 0,
                                    'countPaymentMoth3' => $countNewMoth3 ?? 0,
                                    'countPaymentMoth4' => $countNewMoth4 ?? 0,
                                    'countPaymentMoth5' => $countNewMoth5 ?? 0,
                                    'countPaymentMoth6' => $countNewMoth6 ?? 0,
                                    'countPaymentMoth7' => $countNewMoth7 ?? 0,
                                    'countPaymentMoth8' => $countNewMoth8 ?? 0,
                                    'countPaymentMoth9' => $countNewMoth9 ?? 0,
                                    'countPaymentMoth10' => $countNewMoth10 ?? 0,
                                    'countPaymentMoth11' => $countNewMoth11 ?? 0,
                                    'countPaymentMoth12' => $countNewMoth12 ?? 0,
                                    'payment' => 1,
                                ]) }}"></chart-new-job>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Từ khóa được tìm kiếm nhiều nhất</h6>
                    </div>
                    <div class="card-body">
                        @foreach ($keySearch as $item)
                            <h4 class="small font-weight-bold">{{ $item->key }}<span
                                    class="float-right">{{ $item->count }}</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $item->count }}%"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
