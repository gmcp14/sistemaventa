@extends('layouts.main')
@section('contenido')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Dashboard</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">

            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bienvenido, {{Auth::user()->name}}!</h4>
                    <div class="row m-t-40 justify-content-center">
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-info text-center">
                                    <h1 class="font-light text-white">${{number_format($totalVentas, 2)}}</h1>
                                    <h6 class="text-white">Total Ventas</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-primary text-center">
                                    <h1 class="font-light text-white">{{$cantidadVenta}}</h1>
                                    <h6 class="text-white">Cantidad de Venta</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card card-hover">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white"> {{count($productosBajostock)}}</h1>
                                    <h6 class="text-white">Productos con bajo stock</h6>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <h3>Ultimas Ventas</h3>
                            <ul>
                                @foreach($ventaRecientes as $item)
                                <li>Venta # {{$item->id}} - ${{number_format($item->total_venta, 2)}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection