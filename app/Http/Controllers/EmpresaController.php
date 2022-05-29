<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class EmpresaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $empresas = Empresa::where('empresas.razon_social', 'like', '%' . $request->busq . '%')->paginate(7)->withQueryString();
    return Inertia::render(
      'Empresa/List',
      [
        'empresas' => $empresas,
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
    return Inertia::render('Empresa/Create');
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
      'ruc' => 'required|max:25|unique:empresas',
      'razon_social' => 'required|max:50|unique:empresas',
      'razon_comercial' => 'required|max:50|unique:empresas',
      'direccion' => 'required',
      'responsable' => 'required',
      'telefono' => 'required',
      'celular' => 'required',
      'ubigeo' => 'required'
    ]);

    Empresa::create($request->all());
    return Redirect::route('empresas.index');
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Models\Empresa $empresa
   * @return \Illuminate\Http\Response
   */
  public function show(Empresa $empresa)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Models\Empresa $empresa
   * @return \Illuminate\Http\Response
   */
  public function edit(Empresa $empresa)
  {
    return Inertia::render('Empresa/Edit', ['empresa' => $empresa]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Models\Empresa $empresa
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Empresa $empresa)
  {
    $request->validate([
      'ruc' => 'required|max:25',
      'razon_social' => 'required|max:50',
      'razon_comercial' => 'required|max:50',
      'direccion' => 'required',
      'responsable' => 'required',
      'telefono' => 'required',
      'celular' => 'required',
      'ubigeo' => 'required'
    ]);

    $empresa->update($request->all());
    return Redirect::route('empresas.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Models\Empresa $empresa
   * @return \Illuminate\Http\Response
   */
  public function destroy(Empresa $empresa)
  {
    $empresa->delete();
    return Redirect::route('empresas.index');
  }
}
