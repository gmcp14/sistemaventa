<?php

namespace App\Http\Controllers;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        $totalVentas= Venta::sum('total_venta');
        $cantidadVenta = Venta::count();
        $productosBajostock = Producto::where('cantidad', '<', 5)->get();
        $ventaRecientes = Venta::orderBy('created_at', 'desc')->take(5)->get();
        return view('modules.dashboard.home', compact('totalVentas','cantidadVenta', 'productosBajostock','ventaRecientes'));
    }
}
