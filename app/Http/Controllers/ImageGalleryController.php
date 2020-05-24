<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GalleryFolder;
use App\GalleryImage;
use Illuminate\Support\Facades\DB;
use File;

class ImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fname)
    {
        $folder = DB::table('gallery_folders')->where('folder_name', $fname)->select('folder_name', 'id')->first();
        $imgs = DB::table('gallery_images')->select('img_name', 'id')->get();
        return view('Galeria.ImagenesGaleria', compact('folder'), compact('imgs'));
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
        $r_count = count($request['img']);
            for($x=0; $x<$r_count; $x++){
                if ($request->hasFile('img')) {
                    $file = $request->file('img');
                    $name = time().$file[$x]->getClientOriginalName();
                    $fname = $request->input('fname');
                    $img = new GalleryImage();
                    $img->img_name = $name;
                    $img->folder_id2 = $request->input('fid');
                    $file[$x]->move(public_path().'/'.$fname, $name);
                    $img->save();
                }

            }

        return redirect('/Galeria/'.$fname.'/imagenes');
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
