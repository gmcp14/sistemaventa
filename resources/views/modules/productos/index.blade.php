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
                   
                    <a href="{{route('productos.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                        Crear Producto</a>
                    <hr>
                    <div class="table-responsive">
                        <table id="file_export" class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Categoria</th>
                                    <th>Proveedor</th>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Imagen</th>
                                    <th>Descripcion</th>
                                    <th>Cantidad</th>
                                    <th>Venta</th>
                                    <th>Compra</th>
                                    <th>Activo</th>
                                    <th>Comprar</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr class="text-center">
                                    <td>{{$item->nombre_categoria}}</td>
                                    <td>{{$item->nombre_proveedores}}</td>
                                    <td>{{$item->codigo}}</td>
                                    <td>{{$item->nombre}}</td>
                                    <td>
                                        <img src="{{asset('storage/' . $item->imagen_producto)}}" alt="" 
                                        width="60px" height="60px">
                                        <a href="{{route('productos.show.image', $item->imagen_id)}}" class="badge rounded-pill bg-warning text-dark"><i class=" fas fa-pen-square"></i></a>
                                    </td>
                                    <td>{{$item->descripcion}}</td>
                                    <td>{{$item->cantidad}}</td>
                                    <td>{{$item->precio_venta}}</td>
                                    <td>{{$item->precio_compra}}</td>
                                    
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="{{$item->id}}"
                                                {{ $item->activo ? 'checked' : ''}}>

                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{route('compras.create', $item->id)}}" class="btn btn-info">Comprar</a>
                                    </td>
                                    <td>
                                        <a href="{{route('productos.edit', $item->id)}}" class="btn btn-warning btn-sm"><i class=" fas fa-pen-square"></i>
                                        </a>
                                        <a href="{{route('productos.show', $item->id)}}" class="btn btn-danger btn-sm"><i class=" fas fa-trash"></i></a>
                                    </td>
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
@push('scripts')
<script>
     function cambiar_estado(id, estado){
        $.ajax({
            type:"GET",
            url:"productos/cambiar-estado/"+ id + "/" + estado,
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
      $(document).ready(function(){
        $(".form-check-input").on("change", function(){
            let id = $(this).attr("id");
            let estado = $(this).is(":checked") ? 1 : 0;
            cambiar_estado(id, estado);
            
        });
    });
</script>
@endpush