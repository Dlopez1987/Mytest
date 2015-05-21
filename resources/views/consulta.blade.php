@extends('appheader')
@section('contentheader')

    {{--<link rel="stylesheet" href="/css/datatables/jquery.dataTables.css"/>--}}
    <link rel="stylesheet" type="text/css" href="{{asset('/plugins/datatables/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="/css/datatables/jquery.dataTables.css"/>
    {{--/<link rel="stylesheet" type="text/css"  href="/css/datatables/dataTables.bootstrap.css"/>--}}

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 ">

            </div>
        </div>
        <BR>


            <div class="col-md-12 col-md-offset-0">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title text-light-blue ">Biblioteca Personal</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group ">
                            <form action="{{route('biblio.consulta')}}" class="well form-inline form" method="get">
                                <div class="form-group  ">
                                    <label>Estados</label>
                                    {!! Form::select('estado',$statusorder,'null',array('class'=>'form-control '))!!}

                                    </select>
                                </div>


                                <div class="form-group  ">
                                    {{--<label>IVR</label>--}}
                                    {{--<select class="form-control ">--}}
                                        {{--<option>557</option>--}}
                                        {{--<option>558</option>--}}


                                    {{--</select>--}}
                                </div>
                                {!! Form::submit('Buscar', ['class'=> 'btn btn-primary ',
                                'id'=>'buscar'])!!}
                                {{--<div class="form-group  "><button class="btn btn-block btn-primary">Buscar</button></div>--}}

                              
                            </form>

                        </div>

                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-6">
                                        {{--<div class="dataTables_length" id="example1_length"><label>Show <select--}}
                                                        {{--name="example1_length" aria-controls="example1"--}}
                                                        {{--class="form-control input-sm">--}}
                                                    {{--<option value="10">10</option>--}}
                                                    {{--<option value="25">25</option>--}}
                                                    {{--<option value="50">50</option>--}}
                                                    {{--<option value="100">100</option>--}}
                                                {{--</select> entries</label></div>--}}
                                    </div>
                                    <div class="col-sm-6">
                                        {{--<div id="example1" class="dataTables_filter"><label>Search:<input--}}
                                                        {{--type="search" class="form-control input-sm" placeholder=""--}}
                                                        {{--aria-controls="example1"></label></div>--}}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        @if($query)
                                        <table id="example" class="example table-striped table-bordered" cellspacing="0"
                                               width="100%">
                                            <thead>
                                            <tr>

                                                <th class=" text-light-blue text-center">Nombre/Apellido</th>
                                                <th class=" text-light-blue text-center">Cedula</th>
                                                <th class=" text-light-blue text-center">CI Vencimiento</th>
                                                <th class=" text-light-blue text-center">IVR</th>
                                                <th class=" text-light-blue text-center ">CSS</th>
                                                <th class=" text-light-blue text-center">Estado</th>
                                                <th class=" text-light-blue text-center">frente</th>
                                                <th class=" text-light-blue text-center">dorso</th>
                                                <th class=" text-light-blue text-center">Fecha</th>

                                            </tr>
                                            </thead>
                                            @foreach($query as $v)
                                            <tbody>
                                            <tr class="text-center">
                                                <td>{{{$v->nombre}}}{{{$v->apellido}}}</td>
                                                <td>{{{$v->nro_cedula}}}</td>
                                                <td>{{{$v->fec_vencimiento}}}</td>
                                                <td>{{{$v->ivr}}}</td>
                                                <td>{{{$v->codigo_ss}}}</td>
                                                @if($v->estado==1)
                                                    <td class=" text-light-blue ">Pendiente</td>
                                                @elseif($v->estado==2)
                                                    <td class=" text-light-blue ">Aprobado</td>
                                                @elseif($v->estado==3)
                                                    <td class=" text-light-blue ">Rechazado/{{$v->motivo}}</td>
                                                @endif
                                                <td class=" ">
                                                    <a href="" data-toggle="modal" data-target="#myModalcedula">
                                                        <img src="data:image/png;base64,{{{$v->foto_frente}}}" height='80' width='60' />
                                                    </a>
                                                </td>
                                                <td class=" ">
                                                    <a href="" data-toggle="modal" data-target="#myModalcedula">
                                                        <img src="data:image/png;base64,{{{$v->foto_dorso}}}" width='60' height='80'/>
                                                    </a>
                                                </td>
                                               <td> {{{$v->created_at_date}}}</td>



                                            </tr>

                                            </tbody>
                                                @endforeach
                                        </table>
                                            <!------------------------------------------------------------------------------------>
                                            <div class="modal fade" id="myModalcedula" tabindex="-1" role="dialog"
                                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span
                                                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                                            </button>
                                                            <h4 class="  text-light-blue sorting modal-title" id="myModalLabel">Cedula</h4>

                                                        </div>


                                                        <div class="modal-body">
                                                            @if ($v->foto_frente)
                                                                <div class="form-group">
                                                                    <img src="data:image/png;base64,{{{$v->foto_frente}}}" width='500'
                                                                         height='600'/>
                                                                </div>
                                                            @endif;
                                                            @if($v->foto_dorso)
                                                                <div class="form-group">
                                                                    <img src="data:image/png;base64,{{{$v->foto_dorso}}}" width='500'
                                                                         height='600'/>
                                                                </div>
                                                            @endif;
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                                @else
                                    <p class='text-light-blue'><i class="fa fa-check-square-o"></i>No hay operaciones pendientes.</p>
                                    @endif
                                <!-- /.box-body -->
                            </div>
                        </div>

                    </div>
                </div>

                @endsection
                {{--<script src="{{asset('/plugins/datatables/jquery.dataTables.js')}}" type="text/javascript"></script>--}}

                {{--<script src="{{asset('/js/datatables/dataTables.bootstrap.js')}}" type="text/javascript"></script>--}}

                {{--<script src="{{asset('/js/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>--}}
                {{--<script src="{{asset('/js/datatables/jquery.dataTables.js')}}" type="text/javascript"></script>--}}
