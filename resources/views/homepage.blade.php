@extends('main.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a> -->
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-lg-4 mb-4">
                <a href="/input-data" class="text-decoration-none card border-left-primary shadow h-100">
                    <div class="card-body" style="cursor: pointer;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="text-primary mb-0">Input Bahan Baku</h5>
                            <i class="fas fa-edit fa-2x text-gray-300"></i>
                        </div>
                        <p class="text-gray-800">Untuk Input Bahan Baku</p>
                    </div>
                </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-lg-4 mb-4">
                <a href="/data" class="text-decoration-none card border-left-success shadow h-100">
                    <div class="card-body" style="cursor: pointer;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="text-success mb-0">Data Hasil Perhitungan</h5>
                            <i class="fas fa-table fa-2x text-gray-300"></i>
                        </div>
                        <p class="text-gray-800">Semua Hasil Data Perhitungan</p>
                    </div>
                </a>
            </div>

            @can('admin')
                <div class="col-lg-4 mb-4">
                    <a href="/user-list" class="text-decoration-none card border-left-info shadow h-100">
                        <div class="card-body" style="cursor: pointer;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="text-info mb-0">User</h5>
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                            <p class="text-gray-800">List User</p>
                        </div>
                    </a>
                </div>
            @endcan

        </div>
    </div>
@endsection
