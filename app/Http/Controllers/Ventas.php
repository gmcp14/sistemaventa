<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Session;

class Ventas extends Controller
{
    public function index(){
        $titulo="ventas";
        $items = Producto::all();
        return view('modules.ventas.index', compact('titulo','items'));
    }
    public function agregar_carrito($id_producto){
        //$titulo ='Ventas';
        $item = Producto::find($id_producto);
        $caqntidad_disponible = $item->cantidad;

        $items_carrito= Session::get('items_carrito', []);

        $existe_producto = false;
        foreach($items_carrito as $key => $carrito){
            if($carrito['id'] == $id_producto){
                
            if($carrito['cantidad']>= $caqntidad_disponible){
                return to_route('ventas-nueva')->with('error', 'No hay stock suficiente!!');
            }
                $items_carrito[$key]['cantidad'] += 1;
                $existe_producto = true;
                break;
            }
        }
        if(!$existe_producto){
             $items_carrito []=[
            'id' =>$item->id,
            'codigo'=>$item->codigo,
            'nombre'=>$item->nombre,
            'cantidad'=>1,
            'precio'=>$item->precio_venta
        ];
        }
       
        Session::put('items_carrito', $items_carrito);
        //$items = Producto::all();
         //return view('modules.ventas.index', compact('titulo','items'));
         return to_route('ventas-nueva');
    }
    public function quitar_carrito($id_producto){
        $items_carrito = Session::get('items_carrito',[]);
        foreach($items_carrito as $key => $carrito){
            if($carrito['id'] == $id_producto){
                if($carrito['cantidad'] > 1){
                    $items_carrito[$key]['cantidad'] -=1;
                }else{
                    unset($items_carrito[$key]);
                }
                break;
            }
        }
        Session::put('items_carrito', $items_carrito);
        return to_route('ventas-nueva');
    }

    public function borrar_carrito(){
         Session::forget('items_carrito');
        // $titulo="ventas";
        //$items = Producto::all();
        return to_route('ventas-nueva');

    }
}
