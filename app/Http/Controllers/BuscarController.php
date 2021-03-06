<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuscarController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data=array(
            'query'=>''
        );
		return \View::make('buscar')->with($data);
	}
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function buscar(Requests\ValidateRequest $request)
    {

        $entrada = \Input::all();
        if ($entrada['ivr'] == '') {

            $data = array(
                'query' => ''
            );
            return \View::make('buscar')->with($data);

        }
        if ($entrada['ivr'] != '')



            $query = \DB::table('persons')
                ->join('contracts','persons.nro_cedula','=','contracts.nro_cedula')
                ->select(\DB::raw("persons.id as id,
                               contracts.ivr as ivr,
                                persons.nro_cedula as nro_cedula,
                                         persons.nombre as nombre,
                                       persons.apellido as apellido,


                                        contracts.codigo_ss as codigo_ss,
                                        persons.estado as estado,
                                        persons.foto_frente as foto_frente,
                                        persons.foto_dorso as foto_dorso,
                                        contracts.created_at_date,
                                        persons.id_motivo_rechazo

                                       "))
                ->where('contracts.ivr', '=', $entrada['ivr'])
                ->get();
        if (empty($query)) {

            $data = array(
                'query' => ''
            );
            return \View::make('buscar')->with($data);
        }
        if (!empty($query)) {

            $data = array(
                'query' => $query
            );
            return \View::make('buscar')->with($data);
        }
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
