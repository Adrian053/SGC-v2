<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $iden->gen_id2 = $request->input('gen_id');
        $iden->save();

        return redirect()->action('accionesController@index', ['id' => $iden->gen_id2]);
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
        $form = DB::table('identifications')->where('gen_id2', $id)->get();
        $array = get_object_vars($form[0]);

        $gen_id2 = $id;
        $id = $array['id'];
        $desc = $array['obj_descripcion'];
        $procesos = json_decode($array['procesos']);
        $responsable = $array['responsable'];
        $indicador = $array['indicador'];
        $meta = $array['meta'];
        return view('editarForms.editIdentificacion', compact('id', 'desc', 'procesos','responsable', 'indicador', 'meta', 'gen_id2'));
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
        $procesos = [$request->input('one'),$request->input('two'),$request->input('three')];
        $json = json_encode($procesos);

        DB::table('identifications')->where('id', $id)->update(['obj_descripcion' => $request->input('descripcion'), 'procesos' => $json, 'responsable' => $request->input('responsable'), 'indicador' => $request->input('indicador'), 'meta' => $request->input('meta')]);
                
        $id = $request->input('gen_id2');

        $form = DB::table('generalities')->where('gen_id', $id)->select('objetivo','year')->get();
        $array = get_object_vars($form[0]);

        $year = $array['year'];
        $obj = $array['objetivo'];
        return view('editarForms.editMenu', compact('id', 'obj', 'year'));
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
