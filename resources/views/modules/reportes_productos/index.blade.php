@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
@section('css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">reporte de Productos</h4>
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
                    <h4 class="card-title">Reportes de productos</h4>
                    <h6 class="card-subtitle">tipos de reporte del sistema para productos.</h6>
                   <div class="row">
                    <div class="col text-end">
                        <a href="{{route('reportes_productos.falta-stock')}}" class="btn btn-primary btn-sm">Productos con cantidad 1 o 0</a>
                    </div>
                   </div>
                   
                    <div class="table-responsive">
                        <table id="file_export" class="table table-striped table-bordered display">
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
                                    <td>
                                         <img src="{{asset('storage/' . $item->imagen_producto)}}" alt="" 
                                        width="60px" height="60px">
                                    </td>
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
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="{{ asset ('dist/js/pages/datatable/datatable-advanced.init.js') }}"></script>
@endsection
