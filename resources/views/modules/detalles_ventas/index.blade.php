@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
@section('css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Consultas de ventas hechas</h4>
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
                    <h4 class="card-title">Revisar ventas existentes</h4>
                   
                    
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>total de venta</th>
                                    <th>Fecha ventata</th>
                                    <th>Usuario</th>
                                    <th>ver detalles</th>
                                    <th>Imprimir Ticket</th>
                                    <th>Revocar venta</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr class="text-center">
                                    <td>${{$item->total_venta}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->nombre_usuario}}</td>
                                    <td>
                                        <a href="{{route('detalle.vista.detalle',$item->id)}}" class="btn btn-info">Detalle</a>
                                    </td>
                                    <td><a target="_blank" href="{{route('detalle.ticket', $item->id)}}" class="btn btn-success">Imprimir</a></td>
                                    <td>
                                        <form action="{{route('detalle.revocar', $item->id)}}" method="post" onsubmit="return confirm('¿Esta seguro de revocar la venta?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Revocar</button>
                                        </form>
                                        
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>

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