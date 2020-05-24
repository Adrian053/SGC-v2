<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GalleryFolder;
use Illuminate\Support\Facades\DB;
use File;


class FolderGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $folders = DB::table('gallery_folders')->select('folder_name', 'id')->get();
        return view('Galeria.FoldersGaleria', compact('folders'));
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
        $folder = new GalleryFolder();
        $folder->folder_name=$request->input('folder_name');
        $path = public_path($folder->folder_name);
   
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }else{
            $folder->folder_name = time().$folder->folder_name;
            $path = public_path($folder->folder_name);
            File::makeDirectory($path, 0777, true, true);
        }

        $folder->save();

        return redirect('/Galeria');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($fname)
    {
        return redirect('/Galeria/'.$fname.'/imagenes');
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
        $id = $request->input('fid');
        $folder = DB::table('gallery_folders')->where('id', $id)->first();
        
        $path = public_path($folder->folder_name);
        $folder->folder_name = $request->input('new_name');
        $path2 = public_path($folder->folder_name);
        
        if(File::isDirectory($path) && !FILE::isDirectory($path2)){
            FILE::moveDirectory($path, $path2);
            DB::table('gallery_folders')->where('id', $id)->update(['folder_name' => $request->input('new_name')]);
            return redirect('/Galeria');
        }else{
            return "error";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('fid');
        $folder = DB::table('gallery_folders')->where('id', $id)->first();
        $path = public_path($folder->folder_name);

        if(File::isDirectory($path)){
            FILE::deleteDirectory($path);
            DB::table('gallery_folders')->where('id', $id)->delete();
            return redirect('/Galeria');
        }else{
            return "error";
        }
    }
}
