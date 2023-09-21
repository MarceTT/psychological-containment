<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MenssageRecibed;
use App\Mail\AgendaFecha;
use App\Model\Mensaje;
use App\Model\Usuario;
use Carbon\Carbon;

class MensajesController extends Controller
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
        $mensaje = new Mensaje();
        $mensaje->nombre = $request->nombre;
        $mensaje->apellido_paterno = $request->paterno;
        $mensaje->apellido_materno = $request->materno;
        $mensaje->rut = $request->rut;
        $mensaje->jornada = $request->jornada;
        $mensaje->telefono = $request->telefono;
        $mensaje->email = $request->correo;
        $mensaje->sede = $request->sede;
        $mensaje->tipo = $request->tipo;
        $mensaje->edad = $request->edad;
        $mensaje->motivo = $request->comentario;
        $mensaje->atencion = $request->atencion;
        $mensaje->estado = 1;
        $mensaje->save();

        $mensaje = array(
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->paterno,
            'apellido_materno' => $request->materno,
            'mensaje' => $request->comentario
        );

        $email = 'consulta.psicologica@upv.cl';
        $email2 = $request->correo;

        Mail::to($email)
        ->cc($email2)
        ->send(new MenssageRecibed($mensaje));


        return [
            'message' => 'success'
        ];
    }


    public function agendar(Request $request)
    {
        $mensaje = new Mensaje();
        $mensaje->nombre = $request->nombre;
        $mensaje->apellido_paterno = $request->paterno;
        $mensaje->apellido_materno = $request->materno;
        $mensaje->rut = $request->rut;
        $mensaje->jornada = $request->jornada;
        $mensaje->telefono = $request->telefono;
        $mensaje->email = $request->correo;
        $mensaje->sede = $request->sede;
        $mensaje->tipo = $request->tipo;
        $mensaje->edad = $request->edad;
        $mensaje->motivo = $request->comentario;
        $mensaje->atencion = $request->atencion;
        $mensaje->sicologo_id = $request->usuario;
        $mensaje->fecha = Carbon::createFromFormat('Y-m-d',$request->fecha)->format('d/m/Y');
        $mensaje->hora = $request->hora;
        $mensaje->estado = 2;
        if(!empty($request->derivado)){
            $mensaje->derivado = $request->derivado; 
         }else{
             $mensaje->derivado = 0;
             
         }
        $mensaje->save();

        $mensaje = array(
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->paterno,
            'apellido_materno' => $request->materno,
            'mensaje' => $request->comentario
        );

        $email = $request->correo;

        Mail::to($email)
        ->send(new MenssageRecibed($mensaje));


        return [
            'message' => 'success'
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
        $mensaje = Mensaje::where('rut','=',$id)->where('estado','=',2)->firstOrFail();
        return response()->json($mensaje);
    }



    public function finalizar($id)
    {
          $finalizar = Mensaje::find($id);
          $finalizar->estado = 3;
          $finalizar->save();

          return [
              'message' => 'success'
            ];
    }



    public function epicrisis($id)
    {

        
        


          $finalizar = Mensaje::find($id);
          $finalizar->epicrisis = 1;
          $finalizar->save();

          //CONSULTO EL RUT Y EL ESTADO DE CIERRE
        $rut = Mensaje::select('rut')->where('id','=',$id)->first();
        $estado = Mensaje::where('rut','=',$rut->rut)
                        ->where('epicrisis','=',0)
                        ->update(['cerrar' => 1]);

          return [
              'message' => 'success'
            ];
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mensaje = Mensaje::find($id);
        return response()->json($mensaje);
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
        $id = $request->id;
        $mensajes = Mensaje::find($id);
        $mensajes->sicologo_id = $request->usuario;
        $mensajes->fecha = $request->fecha;
        $mensajes->hora = $request->hora;
        $mensajes->estado = 2;
        $mensajes->reagenda = $mensajes->reagenda + 1;
        $mensajes->save();

        $psicologo = Usuario::select('name')->where('id','=',$request->usuario)->first();
        $usuario = Mensaje::select('nombre','apellido_paterno','apellido_materno','email')->where('id','=',$request->id)->first();


        $mensaje = array(
            'nombre' => $usuario->nombre.' '.$usuario->apellido_paterno.' '.$usuario->apellido_materno,
            'psicologo' => $psicologo->name,
            'fecha' =>$request->fecha,
            'hora' =>$request->hora,
            'mensaje' => $request->mensaje
        );

        $email = $usuario->email;

        Mail::to($email)
        ->send(new AgendaFecha($mensaje));

        return [
            'message' => 'success',
            'retorno' => $id

            ];
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


    public function getTableDetalles($id,$estado,$epicrisis)
    {
        
        $mensajes = Mensaje::with('psicologos')->where('rut','=',$id)->get();
        return Datatables()->of($mensajes)
        ->editColumn('estado', '@if($estado == 1 && $epicrisis == 0)
            <span class="badge badge-success"> INGRESADO</span> 
            @elseif($estado == 2 && $epicrisis == 0)
            <span class="badge badge-primary"> AGENDADA</span>
            @elseif($estado == 3 && $epicrisis == 0)
                <span class="badge badge-info"> ATENDIDO</span> 
            @elseif($estado == 3 && $epicrisis == 1)
            <span class="badge badge-danger"> FINALIZADA CON EPICRISIS</span>
            @endif') 
        ->addColumn('acciones', function ($mensajes) {
            $epicrisis = $mensajes->epicrisis;
            if($mensajes->estado == 3 && $mensajes->cerrar == 1){
                return '<i class="fa fa-check"></i>';
            }
            if($mensajes->estado == 3 && $epicrisis == 0){
                return '<button type="button" onclick="Epicrisis('.$mensajes->id.')" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Finalizar Epicrisis"><i class="fa fa-child"></i></button>
                <button type="button" onclick="NuevoAgendar('.$mensajes->id.')" class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Agenda Nueva Hora"><i class="fa fa-calendar"></i></button>';
            } 
            if($mensajes->estado == 2){
                return '<button type="button" onclick="Finalizar('.$mensajes->id.')" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Finalizar Consulta"> <i class="fa fa-check-square-o"></i></button>';
            } 
            if($mensajes->estado == 3 && $epicrisis == 1){
                return '<i class="fa fa-check"></i>';
            } 
            if($mensajes->cerrar == 1){
                return '<i class="fa fa-check"></i>';
            } else{
                return '<i class="fa fa-check"></i>';
            }
            
        })
        ->rawColumns(['estado','acciones'])
        ->toJson();
        

        
    }
}
