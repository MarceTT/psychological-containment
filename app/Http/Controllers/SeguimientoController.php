<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use App\Model\Seguimiento;
use App\Model\Mensaje;
use App\Model\Dato;
use Carbon\Carbon;
use Auth;
use Yajra\Datatables\Datatables;
use Zipper;

class SeguimientoController extends Controller
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
        $seguimiento = new Seguimiento();
        $seguimiento->id_agenda = $request->id_agenda;
        $seguimiento->observacion = $request->observacion;
        $seguimiento->usuario = Auth::user()->name;
        $seguimiento->id_usuario = Auth::user()->id;
        date_default_timezone_set('America/Santiago');
        $seguimiento->fecha_seguimiento = Carbon::now()->format('d-m-Y');

        if(!empty($request->file('SeguimientoAdjunto'))){
            $files = $request->file('SeguimientoAdjunto');
            $carpeta = 'imagenes/'.str_slug($request->id_agenda, "_").'_'.date('his');
            $destinationPath = $carpeta;
      
              // recorremos cada archivo y lo subimos individualmente
              foreach($files as $file) {
                  $filename = $file->getClientOriginalName();
                  $upload_success = $file->move($destinationPath, $filename);
              }
            $seguimiento->carpeta = $destinationPath;
            $seguimiento->carga = 1;
          }else{
      
            $seguimiento->carpeta = str_slug($request->id_agenda, "_").'_'.date('his');
            File::makeDirectory($seguimiento->carpeta);
            $seguimiento->carga = 0;
      
          }
          if(!empty($request->estado)){
            $seguimiento->estado = $request->estado;
          }else{
            $seguimiento->estado = 2;
          }

          $seguimiento->save();

          

          $llamada = Mensaje::find($request->id_agenda);

          if(!empty($request->estado)){
            $llamada->estado = $request->estado;
          }else{
            $llamada->estado = 2;
          }
          $llamada->save();
   		    return [
           'message' => 'success',
           'retorno' => $llamada->estado
   			];
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

    public function descarga($id)
    {
 
     $decrypted_id = Crypt::decrypt($id);
     $carpeta = Seguimiento::find($decrypted_id);
     $valor_a_buscar = "/";
     $valor_de_reemplazo ="\\";
     $archivos = str_replace($valor_a_buscar, $valor_de_reemplazo, $carpeta->carpeta); 
     $files = glob(public_path($archivos));
 
     //Zipper::make($archivos.'.zip')->add($files)->close();
 
     Zipper::make(public_path($archivos.'.zip'))->add($files)->close();
         return response()->download(public_path($archivos.'.zip'));
 
  
    }

    public function getTableDetalles($id)
    {
        
        $seguimientos = Seguimiento::where('id_agenda','=',$id)->get();
        return Datatables()->of($seguimientos)
        ->editColumn('estado', '@if($estado == 1)
            <span class="badge badge-success"> INGRESADO</span> 
            @elseif($estado == 2)
            <span class="badge badge-info"> AGENDADA</span>
            @else
                <span class="badge badge-danger"> ATENDIDO</span> 
            @endif') 
        ->addColumn('carpeta', function ($seguimientos) {
            if($seguimientos->carga == 1){
            return '<a href="'. route('detalle.descarga', Crypt::encrypt($seguimientos->id)) .'" class="btn btn-warning btn-sm"> <i class="fa fa-cloud-download"></i></a>';
            }
        })
        ->rawColumns(['carpeta','estado'])
        ->toJson();
    }
}
