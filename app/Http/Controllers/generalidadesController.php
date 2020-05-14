<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Generality;
use Illuminate\Support\Facades\DB;
use Auth;

class generalidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('PlanificacionForms.generalidades');
    }


    public function buscar(Request $request){
        $obj = $request->input('s_obj');
        $year = $request->input('s_year');
        $form = DB::table('generalities')->where([['objetivo', "{$obj}"],['year', "{$year}"]])->select('gen_id')->get();

        if(count($form) != 0){
            $array = get_object_vars($form[0]);
            $id = $array['gen_id'];
            return view('editarForms.editMenu', compact('id', 'obj', 'year'));
        }else{
            $id = -1;
            return view('editarForms.editMenu', compact('id', 'obj', 'year'));
        }

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
        $gen = new Generality();
        $gen->objetivo = $request->input('No_Obj');
        $gen->year = $request->input('year');
        $gen->F_aprovacion = $request->input('F_aprovacion');
        $gen->F_apertura = $request->input('F_apertura');
        $gen->F_cumplimiento = $request->input('F_cumplimiento');
        $gen->user_id = Auth::user()->id;
        $gen->save();

        //return redirect()->action('identificacionController@index', ['year' => $gen->year, 'obj' => $gen->objetivo]);
        //return redirect()->route('Identificacion.index', ['id'=>17]);
        //return redirect("/Identificacion");
        return redirect()->action('identificacionController@index', ['id' => $gen->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = DB::table('generalities')->where('gen_id', $id)->get();
        $array = get_object_vars($form[0]);

        $id = $array['gen_id'];
        $obj = $array['objetivo'];
        $year = $array['year'];
        $F_aprovacion = $array['F_aprovacion'];
        $F_apertura = $array['F_apertura'];
        $F_cumplimiento = $array['F_cumplimiento'];
        return view('editarForms.editGenerales', compact('id', 'obj', 'year','F_aprovacion', 'F_apertura', 'F_cumplimiento'));
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
        DB::table('generalities')->where('gen_id', $id)->update(['F_aprovacion' => $request->input('F_aprovacion'), 'F_apertura' => $request->input('F_apertura'), 'F_cumplimiento' => $request->input('F_cumplimiento')]);

        $obj = $request->input('obj');
        $year = $request->input('year');
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
