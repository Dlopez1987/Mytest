<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ConsultaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {
        $entrada = \Input::all();



        if (!empty($entrada)) {
            if($entrada['estado']==3){
                $query = \DB::table('persons')
                    ->join('motivo_rechazo','persons.id_motivo_rechazo','=','motivo_rechazo.id')
                    ->join('contracts','persons.nro_cedula','=','contracts.nro_cedula')
                    ->where('persons.estado', '=', $entrada['estado'])
                    ->select(\DB::raw("persons.nombre as nombre,
                                       persons.apellido as apellido,
                                       persons.nro_cedula as nro_cedula,
                                       persons.fec_vencimiento as fec_vencimiento,
                                        contracts.ivr as ivr,
                                        contracts.codigo_ss as codigo_ss,
                                        persons.estado as estado,
                                        persons.foto_frente as foto_frente,
                                        persons.foto_dorso as foto_dorso,

                                        motivo_rechazo.descripcion as motivo"))
                    ->get();

                $statusorder = array("0" => "Todos", "2" => "Aprobados", "3" => "Rechazados", "1" => "Pendiente");
                $data = array(
//
                    'statusorder' => $statusorder,
                    'query' => $query
//
                );
                return \View::make('consulta')->with($data);
            }
            $query = \DB::table('persons')
                ->join('motivo_rechazo','persons.id_motivo_rechazo','=','motivo_rechazo.id')
                ->join('contracts','persons.nro_cedula','=','contracts.nro_cedula')
                ->where('persons.estado', '=', $entrada['estado'])
                ->select(\DB::raw("persons.nombre as nombre,
                                       persons.apellido as apellido,
                                       persons.nro_cedula as nro_cedula,
                                       persons.fec_vencimiento as fec_vencimiento,
                                        contracts.ivr as ivr,
                                        contracts.codigo_ss as codigo_ss,
                                        persons.estado as estado,
                                        persons.foto_frente as foto_frente,
                                        persons.foto_dorso as foto_dorso,

                                        motivo_rechazo.descripcion as motivo"))

                ->get();

            $statusorder = array("0" => "Todos", "2" => "Aprobados", "3" => "Rechazados", "1" => "Pendiente");
            $data = array(
//
                'statusorder' => $statusorder,
                'query' => $query
//
            );
            return \View::make('consulta')->with($data);
        }

        $statusorder = array("0" => "Todos", "2" => "Aprobados", "3" => "Rechazados", "1" => "Pendiente");
        $data = array(
             'statusorder' => $statusorder,
             'query'=>''
        );
        return \View::make('consulta')->with($data);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
