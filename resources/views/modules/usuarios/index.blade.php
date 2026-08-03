@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
@section('css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Usuarios</h4>
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
                    <h4 class="card-title">Administrar Usuarios</h4>
                    <h6 class="card-subtitle">Administrar las cuentas y roles de usuarios</h6>
                    <a href="{{route('usuarios.create')}}" class="btn btn-primary"><i class=" fas fa-user-plus"></i>
                        Agregar una nuevo Usuario</a>
                    <hr>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Email</th>
                                    <th>Nombre</th>
                                    <th>Rol</th>
                                    <th>Cambio Password</th>
                                    <th>Activo</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr class="text-center">
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->rol}}</td>
                                    <td href="" class="btn btn-secondary btn-sm"><i class=" fas fa-key"></i></td>
                                    <td class=" text-white">
                                        @if($item->activo)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                checked>
                                            
                                        </div>
                                        @else
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            
                                        </div>
                                        @endif
                                    </td>


                                    <td>
                                        <a href="{{route('usuarios.edit', $item->id)}}" class="btn btn-warning btn-sm"><i class=" fas fa-pen-square"></i>
                                        </a>
                                       
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