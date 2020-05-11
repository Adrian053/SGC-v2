<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action;
use Auth;
use File;

class accionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $id)
    {
        return view('PlanificacionForms.acciones', compact('id'));
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
        $tot = $request->input('total');
        $acc = new Action();

        $num = array();
        $desc = array();
        $resp = array();
        $rec = array();
        $Fini = array();
        $pond = array();
        $estado = array();
        $Ffinal = array();
        $evid = array();
        $archivos = array();
        $path = public_path(Auth::user()->name.'/Evidencias');

        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

           for ($i=0; $i < $tot; $i++) {
                $num[$i] = $request->input('No'.($i + 1));
                $desc[$i] = $request->input('desc'.($i + 1));
                $resp[$i] = $request->input('resp'.($i + 1));
                $rec[$i] = $request->input('rec'.($i + 1));
                $Fini[$i] = $request->input('Fini'.($i + 1));
                $pond[$i] = $request->input('pond'.($i + 1));
                $estado[$i] = $request->input('estado'.($i + 1));
                $Ffinal[$i] = $request->input('Ffinal'.($i + 1));
                if($request->hasFile('file'.($i + 1))){
                    $files = $request->file('file'.($i + 1));
                    $n=0;
                    foreach($files as $file){
                        $filename = time().$file->getClientOriginalName();
                        $archivos[$n] = $filename;
                        $n = $n + 1;
                        $file->move(public_path().'/'.Auth::user()->name.'/Evidencias', $filename);
                    }
                    $evid[$i] = $archivos;
                }
            }
        $acc->numero = json_encode($num);
        $acc->descripcion = json_encode($desc);
        $acc->responsable = json_encode($resp);
        $acc->recursos = json_encode($rec);
        $acc->F_inicio = json_encode($Fini);
        $acc->ponderacion = json_encode($pond);
        $acc->estado = json_encode($estado);
        $acc->F_finalizacion = json_encode($Ffinal);
        $acc->evidencias = json_encode($evid);
        $acc->gen_id = $request->input('gen_id');
        $acc->save();
        return redirect('/Planificacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
