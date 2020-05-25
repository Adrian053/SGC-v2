<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Circular;
use Illuminate\Support\Facades\DB;
use File;

class CircularesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $circular = DB::table('circulars')->select('cir_name')->get();
        return view('circulares', compact('circular'));
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
        $r_count = count($request['circular']);
            for($x=0; $x<$r_count; $x++){
                if ($request->hasFile('circular')) {
                    $file = $request->file('circular');
                    $name = time().$file[$x]->getClientOriginalName();
                    $cir = new Circular();
                    $cir->cir_name = $name;
                    $file[$x]->move(public_path().'/Fcirculares', $name);
                    $cir->save();
                }

            }

        return redirect('/Circulares');
    }

    public function eliminar($name){

        File::delete('Fcirculares/'.$name);
        DB::table('circulars')->where('cir_name', $name)->delete();

        return redirect('/Circulares');
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
        return "edit";
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
        return "destroy";
    }
}
