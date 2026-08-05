@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')
@section('css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
<link href="{{ asset('assets/libs/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
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
                            <tbody id="tbody-usuarios">
                               @include('modules.usuarios.tbody')
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('modules.usuarios.modal_cambiar_password')

@endsection
@section('js')
<script src="{{ asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset ('dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
<script src="{{ asset ('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
@endsection

@push('scripts')
<script>
 
    function recargar_tbody(){
        $.ajax({
            type:'GET',
            url:"{{ route('usuarios.tbody') }}",
            success:function(respuesta){
               // console.log(respuesta);
            }
        });
    }
    function cambiar_estado(id, estado){
        $.ajax({
            type:"GET",
            url:"usuarios/cambiar-estado/"+ id + "/" + estado,
            success:function(respuesta){
               if(respuesta== 1){
                 Swal({
                    title: 'Exito!',
                    text: 'Cambio de estado exitoso!',
                    type: 'success',
                    confirmButtonText:'Aceptar'
                });
                recargar_tbody()
               }else{
                   swal({
                    title: 'Fallo!',
                    text: 'no se completo el cambio',
                    type: 'error',
                    confirmButtonText:'Aceptar'
                });
               }
                
            }
        });
    };
    function agregar_id_usuario(id){
        $("#id_usuario").val(id);
        return false;
    }
    function cambio_password(){
        let id=$("#id_usuario").val();
        let password = $("#password").val();
        $.ajax({
            type:"GET",
            url:"usuarios/cambiar-password/" + id + "/" + password,
            success:function(respuesta){
                if(respuesta == 1){
                    Swal({
                    title: 'Exito!',
                    text: 'cambio de contraseña exitoso!',
                    type: 'success',
                    confirmButtonText:'Aceptar'
                });
                    $("#frmpassword")[0].reset();
                }else{
                     swal({
                    title: 'Fallo!',
                    text: 'cambio de contraseña no exitoso',
                    type: 'error',
                    confirmButtonText:'Aceptar'
                }   );
                }
                
            }
        })
        return false;
    }
    
 
    $(document).ready(function(){
        $(".form-check-input").on("change", function(){
            let id = $(this).attr("id");
            let estado = $(this).is(":checked") ? 1 : 0;
           cambiar_estado(id, estado);
            
        });
    });
    </script>
@endpush