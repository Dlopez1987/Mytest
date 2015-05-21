@extends('appheader')
@section('contentheader')

    @if (Session::has('message'))

        <div class="alert alert-success" role="alert" alert-dismissable  col-md-10 col-md-offset-1">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
            <h4> {{ Session::get('message') }}</h4>
        </div>


    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">


                <div class="box-body">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title text-light-blue ">Biblioteca Personal</h3>
                        </div>
                        <br/>

                        @if($query)

                <table
                            ="example" class="example table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr >
                        <th class=" text-light-blue text-center">IVR</th>
                        <th class=" text-light-blue text-center">N°Cedula</th>
                        <th class=" text-light-blue text-center">Nombre/Apellido</th>
                        <th class=" text-light-blue text-center">CSS</th>
                        <th class=" text-light-blue text-center">Aprobado</th>
                        <th class=" text-light-blue text-center">Rechazado</th>
                        <th class=" text-light-blue text-center">Frente</th>
                        <th class=" text-light-blue text-center">Dorso</th>
                        <tr></tr>
                    </tr>
                    </thead>

                    <!--<tfoot>
                    <tr><th rowspan="1" colspan="1">Cedula</th><th rowspan="1" colspan="1">Nombre/Apellido </th><th rowspan="1" colspan="1"></th><th rowspan="1" colspan="1">Cedula1</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                    </tfoot>
                    --->

                        @foreach($query as $v)
                            <tbody>
                            <tr class="text-center">
                                <td>{{{$v->ivr}}} </td>
                                <td class="">{{{$v->nro_cedula}}}</td>
                                <td class=" ">{{{$v->nombre}}} {{{$v->apellido}}}</td>
                                <td class=" ">{{{$v->codigo_ss}}}</td>

                                <td class="text-center">
                                    <a href="{{URL::route('biblio.aprobado')}}?id={{{$v->id}}}&&cedula={{{$v->nro_cedula}}}">
                                              <i
                                                    class="fa fa-check-circle-o fa-3x"></i></a></td>


                                <td class="text-center">
                                    <div class="text-center">
                                        <a class="0"  href="" data-toggle="modal" data-target="#myModal" >
                                            <i class="fa fa-times-circle-o fa-3x"></i></a>
                                    </div>

                                </td>
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
                                <td>

                                        {{--<a href="" data-toggle="modal" data-target="#myModalcedula">--}}
                                            {{--<img src="data:image/png;base64,{{{$v->foto_dorso}}}" width='60' height='80'/>--}}
                                        {{--</a>--}}

                                </td>
                            </tr>


                            </tbody>
                        @endforeach
                        {{--<td colspan="12"><small>[Resumen] Cant.: {{$contador}}</small></td>--}}
                </table>

                <!-------------------------------------------------------->
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="  text-light-blue sorting modal-title" id="myModalLabel">Motivo de
                                    Rechazo</h4>

                            </div>


                            <div class="modal-body">
                                <div class="form-group">
                                    <form action="{{ route('biblio.rechazado') }}" method="get">

                                        <label>
                                            <input type="hidden" name="id" value="{{$v->id }}"/>
                                            <input type="hidden" name="cedula" value="{{$v->nro_cedula }}"/>
                                            <label>
                                                <div id='form' class="form-group">


                                                    <div class="radio">
                                                        <label>

                                                            {!! Form::radio('radio', '1',true) !!} {!!
                                                            Form::label('cod',"Cedula vencida")!!}
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            {!! Form::radio('radio', '2') !!} {!!
                                                            Form::label('cod',"Datos no
                                                            corresponde")!!}
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            {!! Form::radio('radio', '3') !!} {!!
                                                            Form::label('cod',"Calidad imagen no
                                                            corresponde")!!}
                                                        </label>
                                                    </div>
                                                </div>
                                            </label>
                                        </label>

                                        <div class="modal-footer">
                                            <div id='form' class="form-group">

                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                                </button>
                                                {!! Form::submit('Enviar', ['class'=> 'btn btn-primary ',
                                                'id'=>'btn'])!!}

                                            </div>
                                        </div>

                                        {!! Form::close() !!}


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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

                    {{--<div class="pagination">--}}
                    {{--<ul>--}}
                    {{--@if ($page != 1)--}}
                    {{--@if ($page > 1)--}}
                    {{--<li>{{HTML::link(Request::getUri() .'&page='.$pag = $page-1, '&lt;')}}</li>--}}
                    {{--@endif--}}
                    {{--@endif--}}
                    {{--<li><a href="#">{{$page}}</a></li>--}}
                    {{--@if ($total > $page)--}}
                    {{--<li>{{HTML::link(Request::getUri() .'&page='.$page = $page+1, '&gt;')}}</li>--}}
                    {{--@endif--}}

                    {{--</ul>--}}
                    {{--</div>--}}

                    <!--------------------------------------------------------->

                </div>
            </div>
        </div>
    </div>


        @else
            <p class='text-light-blue'><i class="fa fa-check-square-o"></i>No hay operaciones pendientes.</p>
            @endif

    @endsection
            <!-- Button trigger modal -->

    <!--<div class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Modal Default</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body…</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
    <!--  </div><!-- /.modal-dialog -->
    <!--</div>

    -->


