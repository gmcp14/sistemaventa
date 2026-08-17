@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
@section('css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Venta de productos</h4>
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
                    <h4 class="card-title">Crear una nueva venta</h4>
                    <h6 class="card-subtitle">Crear venta de los productos existentes.</h6>

                    <hr>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered" id="productos_carrito">
                            <thead>
                                <tr class="text-center">
                                    <th>Codigo</th>
                                    <th>nombre</th>
                                    <th>cantidad</th>
                                    <th>Precio</th>
                                    <th>Agregar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr class="text-center">
                                    <td>{{$item->codigo}}</td>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->cantidad}}</td>
                                    <td>${{$item->precio_venta}}</td>
                                    <td><a href="{{route('ventas.agregar.carrito', $item->id)}}"
                                            class="btn btn-success"> Agregar</a></td>

                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Carrito de Compras</h4>
                    @if(session('items_carrito'))
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>codigo</th>
                                    <th>nombre</th>
                                    <th>cantidad</th>
                                    <th>Precio</th>
                                    <th>Quitar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $totalGeneral = 0;
                                @endphp
                                @foreach(session('items_carrito') as $item)
                                @php
                                $totalProducto = $item['cantidad']* $item['precio'];
                                $totalGeneral += $totalProducto;
                                @endphp
                                <tr class="text-center">
                                    <td>{{ $item['codigo'] }}</td>
                                    <td>{{ $item['nombre'] }}</td>
                                    <td>{{ $item['cantidad'] }}</td>
                                    <td>{{ $item['precio'] }}</td>
                                    <td>
                                        <a href="{{route('ventas.quitar.carrito', $item['id'])}}"
                                            class="btn btn-danger">Quitar</a>
                                    </td>


                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="text-center">Total General</td>
                                    <td class="text-center"><strong>${{$totalGeneral}}</strong></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                        <hr>
                        <a href="" class="btn btn-primary">Realizar venta</a>
                        <a href="{{route('ventas.borrar.carrito')}}" class="btn btn-danger">Borrar Carrito</a>
                    </div>
                    @else
                    <p> no tengo contenifo</p>
                    @endif

                    <hr>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
<script src="{{ asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset ('dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
@endsection