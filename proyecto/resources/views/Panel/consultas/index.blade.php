@extends('panel.main')
@section('titulo') Consultas @endsection
@section('content')
<div class="pt-1 pb-5">
    <h3 class="h2 d-block pt-2">Consultas</h3>
<hr>
<ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
    <li class="nav-item ">
    <a class="nav-link {{ (session('active')) ? '' : 'active' }}" id="home-tab" data-toggle="tab" href="#p-pendiente" role="tab" aria-controls="p-pendientes" aria-selected="true">Consultas Pendientes</a>
    </li>
    <li class="nav-item ">
    <a class="nav-link {{ (session('active')) ? 'active' : '' }}" id="profile-tab" data-toggle="tab" href="#p-concluidas" role="tab" aria-controls="p-concluidas" aria-selected="false">Consultas Concluidas</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade {{ (session('active')) ? '' : 'active show ' }} " id="p-pendiente" role="tabpanel" aria-labelledby="home-tab">


<div class=" table-responsive ">
    <table class="table table-hover">
        <caption>Lista de Consultas Pendientes</caption>
        <thead>
        <tr class="fondo">
            <th scope="col " style="min-width:530px !important;">Contenido</th>
            <th scope="col" class="text-center">Tipo</th>
            <th scope="col" class="text-center">Categoria</th>
            <th scope="col" class="text-center">Fecha</th>
            <th scope="col"><div class="text-center tabla-w"><span>Acciones</span></div></th>
        </tr>
        </thead>
        <tbody> 
            
            @foreach ($consultaPs as $consulta)
            <tr>    
                    
                    <td class="pt-3 text-size" >{{ $consulta->contenido }}</td>
                    <td class="pt-3 text-size" >{{ $consulta->tipo }}</td> 
                    <td class="pt-3 text-size" >{{ $consulta->categoria }}</td> 
                    <td class="text-center pt-3 text-size">{{   date('d-m-Y', strtotime($consulta->created_at)) }}</td>
                    <td>
                        <a class="btn btn-outline-warning ml-2 mr-2 " href="{{route('consultas.show',$consulta->id)}}"><i class="fa fa-eye"></i></a>

                        <a class="btn btn-outline-success ml-2 mr-2 " href="{{route('consultas.P',$consulta->id)}}"><i class="fa fa-check"></i></a>
                       </td>
                    <td class="text-center"> 
                            </td>
            
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
</div>
<div class="tab-pane fade {{ (session('active')) ? 'active show ' : '' }} " id="p-concluidas" role="tabpanel" aria-labelledby="profile-tab">
    
<div class=" table-responsive ">
    <table class="table table-hover">
        <caption>Lista de Consultas Concluidas</caption>
        <thead>
        <tr class="fondo">
            <th scope="col " style="min-width:550px !important;">Contenido</th>
            <th scope="col" class="text-center">Tipo</th>
            <th scope="col" class="text-center">Categoria</th>
            <th scope="col" class="text-center">Fecha</th>
            <th scope="col"><div class="text-center tabla-w"><span>Acciones</span></div></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($consultaCs as $consulta)
            <tr>
                    <td class="pt-3 text-size" >{{ $consulta->contenido }}</td>
                    <td class="pt-3 text-size" >{{ $consulta->tipo }}</td> 
                    <td class="pt-3 text-size" >{{ $consulta->categoria }}</td> 
                    <td class="text-center pt-3 text-size">{{   date('d-m-Y', strtotime($consulta->created_at)) }}</td>
                   <td>
                    <a class="btn btn-outline-warning ml-2 mr-2 " href="{{route('consultas.show',$consulta->id)}}" data-id="{{$consulta->id}}"><i class="fa fa-eye"></i></a>

                    <a class="btn btn-outline-danger ml-2 mr-2 " href="{{route('consultas.C',$consulta->id)}}" data-id="{{$consulta->id}}"><i class="fa fa-times"></i></a>
                   </td>
                    <td class="text-center"> 
                            </td>
            
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
</div>
</div>
</div>
@endsection