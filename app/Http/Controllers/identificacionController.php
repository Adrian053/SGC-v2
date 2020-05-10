<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Identification;
use App\Generality;

class identificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $id)
    {

        return view('PlanificacionForms.identificacion', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $iden = new identification();
        $iden->obj_descripcion = $request->input('descripcion');
        $procesos = [$request->input('one'),$request->input('two'),$request->input('three')];
        $json = json_encode($procesos);
        $iden->procesos = $json;
        $iden->responsable = $request->input('responsable');
        $iden->indicador = $request->input('indicador');
        $iden->meta = $request->input('meta');
        $iden->gen_id = $request->input('gen_id');
        $iden->save();

        return redirect()->action('accionesController@index', ['id' => $iden->gen_id]);
        //return redirect('/Acciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
