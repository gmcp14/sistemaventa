@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Eliminar un proveedor</h4>
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
                    <h4 class="card-title">¿Esta seguro de eliminar este proveedor?</h4>
                    <h6 class="card-subtitle">Una vez eliminado el proveedor no podra ser recuperado!!!!</h6>
                    
                    <hr>
                    <div class="table-responsive">
                        <table  class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>CP</th>
                                    <th>Sitio Web</th>
                                    <th>Nota</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr class="text-center">
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->telefono}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->cp}}</td>
                                    <td>{{$item->sitio_web}}</td>
                                    <td>{{$item->notas}}</td>
                                    
                                </tr>
                              
                            </tbody>

                        </table>
                        <form action="{{route('proveedores.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger mt-3">Eliminar Proveedor</button>
                             <a href="{{route('proveedores')}}" class="btn btn-info mt-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

