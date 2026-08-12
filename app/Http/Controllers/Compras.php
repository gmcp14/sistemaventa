<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Compras extends Controller
{
    public function index(){
        $titulo="compras";
        $items= Compra::select(
            'compra.*',
            'users.name as nombre_usuario',
            'productos.nombre as nombre_producto'
        )
        ->join('users', 'compra.user_id', 'users.id')
        ->join('productos', 'compra.producto_id', '=', 'productos.id')
        ->get();
        return view('modules.compras.index', compact('titulo', 'items'));
    }
    public function create($id){
        $titulo= 'Compra productos';
        $item= Producto::find($id);
        return view('modules.compras.create', compact('titulo', 'item'));
    }
    public function store(Request $request){
       
       try {
        $item = new Compra();
        $item->user_id = Auth::user()->id;
        $item ->producto_id = $request->id;
        $item->cantidad = $request->cantidad;
        $item->precio_compra = $request->precio_compra;
        if($item->save()){
            $item = Producto::find($request->id);
            $item->cantidad= ($item->cantidad + $request->cantidad);
            $item->precio_compra= ( $request->precio_compra);
            $item->save();
        }
         return to_route('productos')->with('success','Compra exitosa!!.');
       } catch (\Throwable $th) {
         return to_route('productos')->with('error','No puedo comprar!!.' . $th->getMessage());
         
       }

    }
    public function edit($id){
        $titulo = 'editar compra';
         $item= Compra::select(
            'compra.*',
            'users.name as nombre_usuario',
            'productos.nombre as nombre_producto'
           
        )
        ->join('users', 'compra.user_id', 'users.id')
        ->join('productos', 'compra.producto_id', '=', 'productos.id')
        ->where('compra.id', $id)
        ->first();
        return view('modules.compras.edit', compact('titulo', 'item'));
    }
    public function update(Request $request, string $id){
        try {
           $cantidad_anterior= 0;
           $item= Compra::find($id);
           $cantidad_anterior =  $item->cantidad;
           $item->cantidad = $request->cantidad;
           $item->precio_compra= $request->precio_compra;
           if($item->save()){
            $item= Producto::find($request->producto_id);
            $cantidad_anterior = $item->cantidad - $cantidad_anterior;
            $item->cantidad = $cantidad_anterior + $request->cantidad;
            $item->save();
           }
           return to_route('compras')->with('success','Compra actualizada con exito!!.');
        } catch (\Throwable $th) {
            return to_route('compras')->with('error','No puedo  actualizar la comprar!!.' . $th->getMessage());
        }
    }
    public function show(string $id)
    {
        $titulo= 'Eliminar Compra';
        $items= Compra::select(
            'compra.*',
            'users.name as nombre_usuario',
            'productos.nombre as nombre_producto'
        )
        ->join('users', 'compra.user_id', 'users.id')
        ->join('productos', 'compra.producto_id', '=', 'productos.id')
        ->where('compra.id', $id)
        ->first();
        
        return view('modules.compras.show', compact('titulo', 'items'));
    }
    public function destroy(string $id, Request $request)
    {
        try {
            $item= Compra::find($id);
            $cantidad_compra = $item->cantidad;
            if($item->delete()){
                $item= Producto::find($request->producto_id);
                $item->cantidad = $item->cantidad - $cantidad_compra;
                $item->save();
                 return to_route('compras')->with('success','Compra eliminada exitosamente!!.');
            }else{
                 return to_route('compras')->with('errror','Compra no se elimino!!.');
            }
        
           
        } catch (\Throwable $th) {
            return to_route('compras')->with('error','Fallo al eliminar la compra!!.' . $th->getMessage());
        }
    }
    
}
