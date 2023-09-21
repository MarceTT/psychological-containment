<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\Datatables\Datatables;
use App\Model\Mensaje;
use App\Model\Usuario;
use Auth;
use DB;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::where('type','=','psicologo')->get();
        $agendadas = Mensaje::with('psicologos')->where('estado','=',2)->get();
        $atendidasAgrupadas = Mensaje::select('id','rut','nombre','apellido_paterno','email','fecha','hora','estado','epicrisis','sicologo_id','created_at')
                                        ->with('psicologos')
                                        ->where('estado','=',3)
                                        ->whereIn('epicrisis', [0, 1])
                                        ->groupBy('rut','id','nombre','apellido_paterno','email','fecha','hora','estado','epicrisis','sicologo_id','created_at')
                                        //->orderByRaw('fecha', 'desc')
                                        ->get();
        $atendidas = $atendidasAgrupadas->unique(['rut']);
        //dd($atendidas);
        //exit();
        $epicrisis = Mensaje::with('psicologos')->where('epicrisis','=',1)->get();
        return view('mensajes.index', compact('usuarios','agendadas','atendidas','epicrisis'));
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
        $mensaje = Mensaje::find($id);
        return response()->json($mensaje);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dato = Mensaje::find($id);
        return response()->json($dato);
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

    public function getTableMensajes()
    {
         $mensajes = Mensaje::where('estado','=',1)->get();
        return Datatables()->of($mensajes)
        ->editColumn('estado', '@if($estado == 1)
                  <span class="badge badge-success"> INGRESADA</span> 
                @endif')  
        ->addColumn('acciones', function ($mensajes) {
                return '<button type="button" onclick="Detalles('.$mensajes->id.')" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-placement="top" title="Agendar Hora"> <i class="fa fa-calendar"></i></button>'; 
            })
        ->rawColumns(['acciones','estado'])
        ->toJson();
    }


}
