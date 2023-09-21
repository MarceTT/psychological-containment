<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Mensaje;
use Carbon\Carbon;

class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('calendario.calendario');
    }

    public function listar()
    {
        $agenda = Mensaje::with('psicologos')->where('estado','=',2)->orWhere('estado','=',3)->orWhere('epicrisis','=',1)->get();
        $horas = [];

        foreach($agenda as $value){
            $horas[] = [
                "id" => $value->id,
                "start" => Carbon::createFromFormat('d/m/Y',$value->fecha)->format('Y-m-d'). " ".$value->hora.':00',
                "end" => Carbon::createFromFormat('d/m/Y',$value->fecha)->format('Y-m-d'). " ".date("H:i",strtotime($value->hora)+2700).':00',
                "title" => $value->nombre." ".$value->apellido_paterno." ".$value->apellido_materno,
                "backgroundColor" => $value->estado == 2 ? "#28a745" : ($value->estado==3 && $value->epicrisis==1 ? "#9954BB": "#dc3545"),
                "textColor" => "#fff",
                "extendedProps" =>[
                    "psicologo" => $value->psicologos->name,
                    'paciente' => $value->nombre." ".$value->apellido_paterno." ".$value->apellido_materno,
                    'fecha' => $value->fecha,
                    'hora' => $value->hora,
                    'estado' =>$value->estado == 2 ? "AGENDADA" : ($value->estado==3 && $value->epicrisis==1 ? "FINALIZADA CON EPICRISIS": "ATENTIDA")
                ]
            ];

        }

        return response()->json($horas);
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
