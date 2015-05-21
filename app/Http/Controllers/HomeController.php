<?php namespace App\Http\Controllers;

use View;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		// return view('principal');


        try {
        $contador=\DB::table('persons')
                      ->count();
        $total = ceil( $contador / 20);
        $select=\DB::getQueryLog();
        $last_query = end($select);
        $pages=1;
        $offset = ($pages- 1) * 20;
           $query = \DB::table('persons')
               ->join('contracts', 'persons.nro_cedula', '=', 'contracts.nro_cedula')
               ->select(\DB::raw("persons.id as id,contracts.ivr as ivr,persons.nro_cedula as nro_cedula,persons.nombre as nombre,persons.apellido as apellido,contracts.codigo_ss as codigo_ss,persons.estado as estado,persons.foto_frente as foto_frente,persons.foto_dorso as foto_dorso"))
               ->where('personss.estado', '=', 1)
               ->take(20)->skip($offset)->get();
       }catch (\Exception $e){
           \Log::info("error al intentar realizar la consulta ");
           \Log::info($e->getMessage());

            $data=array('query'=>'',
                'contador'=>$contador,
                'total'=>$total,
                'page'=>$pages,);

            return    View::make('home1')->with($data);

       }

            //dd($query[0]->foto_frente);
            //dd($query[0]->nro_cedula);
       // dd($query);
         //  die();
           //$imagen=$query;
        foreach($query as $v=>$value) {
            if ($query[$v]->foto_frente) {
                $cedula1=$query[$v]->nro_cedula.'_1.png';
                $image=base64_decode($query[$v]->foto_frente);
                file_put_contents("image/$cedula1",$image);
            }
            if ($query[$v]->foto_dorso) {
                $cedula2=$query[$v]->nro_cedula.'_2.png';
                $image=base64_decode($query[$v]->foto_dorso);
                file_put_contents("image/$cedula2",$image);
            }

        }


      //  die($cedula);


      //file_put_contents("image/$cedula",$image);


//$data=array('image'=>image.png);
       // \Log::info($query);
        $data=array('query'=>$query,
                    'contador'=>$contador,
                    'total'=>$total,
                    'page'=>$pages,);

		return    View::make('home1')->with($data);

	}

}
