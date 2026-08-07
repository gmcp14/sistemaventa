@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
@section('css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Proveedores</h4>
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
                    <h4 class="card-title">Administrar Proveedores</h4>
                    <h6 class="card-subtitle">Administrar los Proveedores de  productos.</h6>
                    <a href="" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Agregar un nuevo proveedor</a>
                    <hr>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>CP</th>
                                    <th>Sitio Web</th>
                                    <th>Nota</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($items as $item)
                                <tr class="text-center">
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->telefono}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->cp}}</td>
                                    <td>{{$item->sitio_web}}</td>
                                    <td>{{$item->notas}}</td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm"><i class=" fas fa-pen-square"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm"><i class=" fas fa-trash"></i></a>
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