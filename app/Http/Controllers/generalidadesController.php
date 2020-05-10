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
