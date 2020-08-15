@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
        <div class="col-sm-6">
            <!-- <h1 class="m-0 text-dark"> LMS-Laundry <small>Layanan Laundry Antar Jemput</small></h1> -->
        </div><!-- /.col -->
        <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Layout</a></li>
            <li class="breadcrumb-item active">Top Navigation</li>
            </ol> -->
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="content">
        <div class="container">
            <div class="row">
            <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="{{asset('public/dist/img/first.jpg')}}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('public/dist/img/unnamed_1.jpg')}}" alt="Second slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-6">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">                               
                            <i class="fas fa-edit"></i>
                                Pilih Jenis Laundry
                            </h3>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="laundry-kiloan-tab" data-toggle="pill" href="#laundry-kiloan" role="tab" aria-controls="laundry-kiloan" aria-selected="true">Kiloan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="laundry-satuan-tab" data-toggle="pill" href="#laundry-satuan" role="tab" aria-controls="laundry-satuan" aria-selected="true">Satuan</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="custom-content-below-tabContent">
                                <div class="tab-pane fade show active" id="laundry-kiloan" role="tabpanel" aria-labelledby="laundry-kiloan-tab">
                                    <div id="kiloan"></div>
                                </div>
                                <div class="tab-pane fade" id="laundry-satuan" role="tabpanel" aria-labelledby="laundry-satuan-tab">
                                    <div id="satuan"></div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::user()->access==1)
            <h5 class="mt-4 mb-2">Admin Laundry</h5>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-app" href="{{route('Laundry')}}">
                                <i class="fas fa-tshirt"></i> Admin Laundry
                            </a>
                            <a class="btn btn-app" href="{{route('Status')}}">
                                <i class="fas fa-cube"></i> Cek Status
                            </a>
                            <a class="btn btn-app" href="{{route('History')}}">
                                <i class="fas fa-archive"></i> History
                            </a>
                        </div>
                    </div>                    
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<script>
    $("#kiloan").load('{{route('Laundry_Kiloan')}}');
    $("#satuan").load('{{route('Laundry_Satuan')}}');
</script>
@endsection
