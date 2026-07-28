@extends('layouts.main')
@section('contenido')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Categorias</h4>
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
                                <h4 class="card-title">Administrar Categorias</h4>
                                <h6 class="card-subtitle">Administrar las categorias de nuestros productos.</h6>
                                <button class="btn btn-primary">Agregar una nueva Categoria</button>
                                <hr>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                               <th>Nombre Categoria</th>
                                               <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td></td>
                                            <td>
                                                <a href="" class="btn btn-warning btn-sm">Editar <a/>
                                                <a href="" class="btn btn-danger btn-sm">Eliminar <a/>
                                            </td>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 </div>

@endsection