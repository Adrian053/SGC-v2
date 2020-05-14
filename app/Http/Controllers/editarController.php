<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Generality;

class editarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = 0;
        return view('editarForms.editMenu', compact('id'));
    }

    /*public function buscar(Request $request){
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

    public function editar($id){
        $form = DB::table('generalities')->where('gen_id', $id)->get();
        $array = get_object_vars($form[0]);

        $id = $array['gen_id'];
        $F_aprovacion = $array['F_aprovacion'];
        $F_apertura = $array['F_apertura'];
        $F_cumplimiento = $array['F_cumplimiento'];
        return $F_cumplimiento;
    }*/
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
