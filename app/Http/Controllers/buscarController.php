<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Generality;
use Illuminate\Support\Facades\DB;
use App\Identification;
use App\Action;

class buscarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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

    public function buscar(Request $request){
        $obj = $request->input('obj');
        $year = $request->input('year');
        $gen = DB::table('generalities')->where([['objetivo', "{$obj}"],['year', "{$year}"]])->get();

        if(count($gen) != 0){
            $array_gen = get_object_vars($gen[0]);
            $id = $array_gen['gen_id'];
            $F_aprovacion = $array_gen['F_aprovacion'];
            $F_apertura = $array_gen['F_apertura'];
            $F_cumplimiento = $array_gen['F_cumplimiento'];

            $iden = DB::table('identifications')->where('gen_id2', $id)->get();
            $array_iden = get_object_vars($iden[0]);

            $desc = $array_iden['obj_descripcion'];
            $procesos = json_decode($array_iden['procesos']);
            $responsable = $array_iden['responsable'];
            $indicador = $array_iden['indicador'];
            $meta = $array_iden['meta'];

            $acc = DB::table('actions')->where('gen_id2', $id)->get();
            $array_acc = get_object_vars($acc[0]);
            
            $num = json_decode($array_acc['numero']);
            $desc_acc = json_decode($array_acc['descripcion']);
            $resp_acc = json_decode($array_acc['responsable']);
            $rec = json_decode($array_acc['recursos']);
            $F_inicio = json_decode($array_acc['F_inicio']);
            $pond = json_decode($array_acc['ponderacion']);
            $est = json_decode($array_acc['estado']);
            $F_final = json_decode($array_acc['F_finalizacion']);
            $evid = json_decode($array_acc['evidencias']);

            return view('buscar', compact('id', 'obj', 'year','F_aprovacion', 'F_apertura', 'F_cumplimiento','desc', 'procesos','responsable', 'indicador', 'meta','num','desc_acc','resp_acc','rec','F_inicio','pond','est','F_final','evid'));
        }else{
            $id = -1;
            return view('buscar', compact('id', 'obj', 'year'));
        }
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
