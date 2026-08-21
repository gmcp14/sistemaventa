@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
@section('css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Detalle de la venta</h4>
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
                    <h4 class="card-title">detalle de la venta</h4>
                    <p><strong>Usuario que hizo la venta:</strong>{{$venta->nombre_usuario}}</p>
                    <p><strong>Total de  venta:</strong>${{$venta->total_venta}}</p>
                    <p><strong>Fecha:</strong>{{$venta->created_at}}</p>
                   <hr>

                    
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio unitario</th>
                                    <th>subtotal</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detalles as $item)
                                <tr class="text-center">
                                    <td>{{$item->nombre_producto}}</td>
                                    <td>{{$item->cantidad}}</td>
                                    <td>{{$item->precio_unitario}}</td>
                                    <td>{{$item->sub_total}}  </td>                     
                                  
                                    
                                    
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <a href="{{route('detalle-venta')}}" class="btn btn-info">Cancelar</a>
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