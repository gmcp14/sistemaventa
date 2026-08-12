@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
@section('css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Productos</h4>
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
                    <h4 class="card-title">Administrar Productos y stock</h4>
                    <h6 class="card-subtitle">Administrar el stock del producto.</h6>
                   
                   
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Categoria</th>
                                    <th>Proveedor</th>
                                    <th>Nombre</th>
                                    <th>Imagen</th>
                                    <th>Descripcion</th>
                                    <th>Cantidad</th>
                                    <th>Venta</th>
                                    <th>Compra</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr class="text-center">
                                    <td>{{$item->nombre_categoria}}</td>
                                    <td>{{$item->nombre_proveedores}}</td>
                                    <td>{{$item->nombre}}</td>
                                    <td></td>
                                    <td>{{$item->descripcion}}</td>
                                    <td>{{$item->cantidad}}</td>
                                    <td>{{$item->precio_compra}}</td>
                                    <td>{{$item->precio_venta}}</td>
                                    
                                    
                                </tr>

                            </tbody>
                            @endforeach
                        </table>
                    </div>
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
