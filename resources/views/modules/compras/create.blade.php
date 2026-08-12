@extends('layouts.main')
@section('titulo', $titulo)
@section('contenido')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"> Hacer un compra</h4>
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
                    <h4 class="card-title">Compra nueva de : {{$item->nombre}}</h4>
                    <form action="{{route('compras.store')}}" method="POST">
                        @csrf
                        <input type="text" value="{{$item->id}}" id="id" name='id' hidden>
                        <label for="">Cantidad del producto</label>
                        <input type= "text" class="form-control" required name="cantidad" id="cantidad">

                        <label for="">Precio de compra</label>
                       <input type= "text" class="form-control" required name="precio_compra" id="precio_compra">
                        <button class="btn btn-primary mt-3">Guardar</button>
                        <a href="{{route('productos')}}" class="btn btn-info mt-3">Cancelar</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
