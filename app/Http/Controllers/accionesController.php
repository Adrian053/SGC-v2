<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Action;
use App\Generality;
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
        $acc->gen_id2 = $request->input('gen_id');
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
        $form = DB::table('actions')->where('gen_id2', $id)->get();
        $array = get_object_vars($form[0]);
        
        $gen_id2 = $id;
        $id = $array['id'];
        $num = json_decode($array['numero']);
        $desc = json_decode($array['descripcion']);
        $resp = json_decode($array['responsable']);
        $rec = json_decode($array['recursos']);
        $F_inicio = json_decode($array['F_inicio']);
        $pond = json_decode($array['ponderacion']);
        $est = json_decode($array['estado']);
        $F_final = json_decode($array['F_finalizacion']);
        $evid = json_decode($array['evidencias']);

        return view('editarForms.editAcciones', compact('id','gen_id2','num','desc','resp','rec','F_inicio','pond','est','F_final','evid'));
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

        $tot = $request->input('total');
        //$acc = new Action();

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
        $e = array();
        $elim = array();

        /*$form = DB::table('actions')->where('id', $id)->get();
        $array = get_object_vars($form[0]);
        $ev = json_decode($array["evidencias"], true);
        $keys = array_keys($ev);

        for($j=0; $j<sizeof($keys); $j++){
            $evid[$keys[$j]] = $ev[$keys[$j]];
        }*/
            for($i=0; $i<$request->input('toelim'); $i++){
                $elim[$i] = $request->input('el'.$i);
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
                $e[$i] = $request->input('x'.$i);
                $evid[$i] = [];
                if($request->hasFile('files'.($i + 1))){
                    $files = $request->file('files'.($i + 1));
                    $n=0;
                    $archivos = [];
                    foreach($files as $file){
                        $filename = time().'_'.$file->getClientOriginalName();
                        $archivos[$n] = $filename;
                        $n = $n + 1;
                    }
                    $evid[$i] = $archivos;
                }
            }



            for($i = 0; $i<$tot; $i++){
                if($e[$i] != null){
                    for($j = 0; $j<sizeof($e[$i]); $j++){
                        if($elim[$i] != null){
                            if(!(in_array($e[$i][$j],$elim[$i]))){
                                array_push($evid[$i], $e[$i][$j]);
                            }
                        }else{
                            array_push($evid[$i], $e[$i][$j]);
                        }
                    }
                }
            }


        DB::table('actions')->where('id', $id)->update(['numero' => $num, 'descripcion' => $desc, 'responsable' => $resp, 'recursos' => $rec, 'F_inicio' => $Fini, 'ponderacion' => $pond, 'estado' => $estado, 'F_finalizacion' => $Ffinal, 'evidencias' => $evid]);

        $id = $request->input('gen_id');
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
