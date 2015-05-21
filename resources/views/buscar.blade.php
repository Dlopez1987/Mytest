@extends('appheader')
@section('contentheader')
    <link rel="stylesheet" type="text/css" href="{{asset('/plugins/datatables/dataTables.bootstrap.css')}}"/>
    {{--<link rel="stylesheet" type="text/css" href="{{asset('/css/datatables/jquery.dataTables.css')}}"/>--}}
    <br/>
    <div class="col-md-10 col-md-offset-1">
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
                                <th class=" text-light-blue ">Nombre/Apellido</th>
                                <th class=" text-light-blue ">Cedula</th>
                                <th class=" text-light-blue ">IVR</th>
                                <th class=" text-light-blue ">Estado</th>
                                <th class=" text-light-blue ">CSS</th>

                                <th class=" text-light-blue ">Fecha</th>


                            </tr>
                        </thead>
                        @foreach($query as $v)
                        <tbody>
                        <tr>
                            <td>{{{$v->nombre}}}{{$v->apellido}}</td>
                            <td>{{{$v->nro_cedula}}}</td>
                            <td>{{{$v->ivr}}}</td>
                            @if($v->estado==1)
                                <td class=" text-light-blue ">Pendiente</td>
                            @elseif($v->estado==2)
                                <td class=" text-light-blue ">Aprobado</td>
                            @elseif($v->estado==3)
                                <td class=" text-light-blue ">Rechazado</td>
                            @endif
                            <td>{{{$v->codigo_ss}}}</td>
                            <td>fecha</td>

                        </tr>
                        </tbody>
                            @endforeach
                    </table>
                        @else
                        <p class='text-light-blue'><i class="fa fa-check-square-o"></i>No existen datos para mostrar.</p>
                        @endif

                </div>

            </div>
        </div>
    </div>

@endsection
