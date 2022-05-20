<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ProductosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $productos = Producto::where('productos.nombre', 'like', '%' . $request->busq . '%')->paginate(5)->withQueryString();
    return Inertia::render(
      'Productos/List',
      [
        'productos' => $productos,
        'filters' => ['busq' => $request->busq]
      ]
    );
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return Inertia::render('Productos/Create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'nombre' => 'required|max:50|unique:productos',
      'codigo' => 'required|max:25',
      'precio_sin_igv' => 'required|numeric',
      'igv' => 'required|numeric',
      'precio_con_igv' => 'required|numeric'
    ]);

    //Producto::create($request->all());
    return Redirect::route('productos.index');
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Models\Producto $producto
   * @return \Illuminate\Http\Response
   */
  public function show(Producto $producto)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Models\Producto $producto
   * @return \Illuminate\Http\Response
   */
  public function edit(Producto $producto)
  {
    //dd($producto);
    return Inertia::render('Productos/Edit', ['producto' => $producto]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Models\Producto $producto
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Producto $producto)
  {
    $producto->update($request->all());
    return Redirect::route('productos.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Models\Producto $producto
   * @return \Illuminate\Http\Response
   */
  public function destroy(Producto $producto)
  {
    //
  }
}
