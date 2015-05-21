@extends('appheader')
@section('contentheader')
    <link rel="stylesheet" type="text/css" href="{{asset('/plugins/datatables/dataTables.bootstrap.css')}}"/>
    {{--<link rel="stylesheet" type="text/css" href="{{asset('/css/datatables/jquery.dataTables.css')}}"/>--}}
    <br/>
    <div class="col-md-12 col-md-offset-0">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title text-light-blue ">Biblioteca Personal</h3>
            </div>
                <div class="box-body">
                    <form action="{{route('biblio.buscar')}}" class="well form-inline form" method="get">
                    <div class="form-group">
                        <div class="form-group">
                                <label><h3>Buscar<small>Busqueda por IVR</small></h3></label>
                        </div>
                    </div>
                    <div class="form-group">
                      {!!  Form::text('ivr',null,array('class'=>'form-control','placeholder'=>'Ingrese IVR')) !!}
                    </div>
                     <div class="form-group">
                         {!! Form::submit('Buscar', ['class'=> 'btn btn-primary ',
                         'id'=>'buscar'])!!}
                     </div>
                    </form>
                </div>
            <br/>
            <div class="row">
                <div class="col-sm-12">
                    @if($query)
                    <table id="example" class="example table-striped table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                            <tr>
                                <th class=" text-light-blue text-center ">Nombre/Apellido</th>
                                <th class=" text-light-blue text-center">Cedula</th>
                                <th class=" text-light-blue text-center">IVR</th>
                                <th class=" text-light-blue text-center">Estado</th>
                                <th class=" text-light-blue text-center">CSS</th>
                                <th class=" text-light-blue text-center">frente</th>
                                <th class=" text-light-blue text-center">dorso</th>
                                <th class=" text-light-blue text-center">Fecha</th>


                            </tr>
                        </thead>
                        @foreach($query as $v)
                        <tbody>
                        <tr class="text-center">
                            <td>{{{$v->nombre}}}{{$v->apellido}}</td>
                            <td>{{{$v->nro_cedula}}}</td>
                            <td>{{{$v->ivr}}}</td>
                            @if($v->estado==1)
                                <td class=" text-light-blue ">Pendiente</td>
                            @elseif($v->estado==2)
                                <td class=" text-light-blue ">Aprobado</td>
                            @elseif($v->estado==3)
                                   @if($v->id_motivo_rechazo==1)
                                        <td class=" text-light-blue ">Rechazado/Cedula Vencida</td>
                                   @elseif($v->id_motivo_rechazo==2)
                                        <td class=" text-light-blue ">Rechazado/Datos no Corresponde</td>
                                    @elseif($v->id_motivo_rechazo==3)
                                         <td class=" text-light-blue ">Rechazado/Mala calidad de la imagen</td>
                                       @endif

                            @endif
                            <td>{{{$v->codigo_ss}}}</td>
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
                            <td>{{{$v->created_at_date}}}</td>

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

                    @else
                        <p class='text-light-blue'><i class="fa fa-check-square-o"></i>No existen datos para mostrar.</p>
                        @endif

                </div>

            </div>
        </div>
    </div>

@endsection
