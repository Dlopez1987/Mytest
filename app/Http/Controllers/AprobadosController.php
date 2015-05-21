<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AprobadosController extends Controller {

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
     * ID;nro_cedula para la actualizacion
     * 1-pendiete;2-Aprobado;3-Rechazado
	 */
	public function update()
	{
        $entrada = \Input::all();
        $query = \DB::table('persons')
            ->select('id', 'nro_cedula', 'estado')
            ->where('id', '=', $entrada['id'])
            ->get();
        //dd($query[0]->estado);
        if ($query[0]->estado == 2 || $query[0]->estado == 3)
            return redirect()->back()->with('message', 'operacion ya realizada por otro usuario');
        elseif ($query[0]->estado == 1)
            \DB::table('persons')
                ->where('id', '=', $entrada['id'])
                ->update(['estado' => 2]);

        $data = array(
            'message' => ' Operacion Aprobada',
            'alert' => 'success'
        );
//        \Session::get('message','Bienvenido al reporte de ');
//        \Session::get('alert','success');
        return redirect()->back()->with($data);
        //28.6 return redirect()->back();


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
