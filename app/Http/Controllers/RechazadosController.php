<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RechazadosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function update()
    {
        $entrada = \Input::all();
        $hoy = date("Y-m-d H:i:s");
        //dd($entrada);
        //die();
        $query = \DB::table('persons')
            ->select('id', 'nro_cedula', 'estado')
            ->where('id', '=', $entrada['id'])
            ->get();
        \Log::info($query);
        if ($query[0]->estado == 2 || $query[0]->estado == 3)
            return redirect()->back()->with('message', 'operacion ya realizada por otro usuario');
        elseif ($query[0]->estado == 1)
            \DB::table('persons')
                ->where('id', '=', $entrada['id'])
                ->update(['estado' => 3,'id_motivo_rechazo'=>$entrada['radio']]);

       // $message = 'operacion aprobada';
        return redirect()->back()->with('message', 'Operacion Rechazada');

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
