<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NahidulHasan\Html2pdf\Facades\Pdf;
use App\Generality;
use Illuminate\Support\Facades\DB;
use App\Identification;
use App\Action;


class html2pdfController extends Controller
{
    public function index(Request $request){
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

            /*return view('reportes', compact('id', 'obj', 'year','F_aprovacion', 'F_apertura', 'F_cumplimiento','desc', 'procesos','responsable', 'indicador', 'meta','num','desc_acc','resp_acc','rec','F_inicio','pond','est','F_final','evid'));*/

            $html = '<html><body>'
    . '<p>Put your html here, or generate it with your favourite '
    . 'templating system.</p>'
    . '</body></html>';

    $invoice = pdf::generatePdf($html);

            //$document =  Pdf::generatePdf(view('reportes', ['id' => $id, 'obj' => $obj, 'year' => $year,'F_aprovacion' => $F_aprovacion, 'F_apertura' => $F_apertura, 'F_cumplimiento' => $F_cumplimiento]));
            pdf::stream(view('GeneraReporte',compact('id', 'obj', 'year','F_aprovacion', 'F_apertura', 'F_cumplimiento','desc', 'procesos','responsable', 'indicador', 'meta','num','desc_acc','resp_acc','rec','F_inicio','pond','est','F_final')));

            /*return view('prueba',compact('id', 'obj', 'year','F_aprovacion', 'F_apertura', 'F_cumplimiento','desc', 'procesos','responsable', 'indicador', 'meta','num','desc_acc','resp_acc','rec','F_inicio','pond','est','F_final'));*/
        }else{
            $id = -1;
            return view('reportes', compact('id', 'obj', 'year'));
        }
    }
}
