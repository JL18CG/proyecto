@extends('panel.main')
@section('titulo') Usuarios @endsection
@section('content')
<h1>  Usuarios  </h1>
<a class="btn btn-success mt-3 mb-3" href="{{route('user.create')}}"> +Crear</a>

<table class="table">
    <thead>
        <td> ID </td>
        <td> Nombre </td>
        <td> Nivel </td>
        <td> Acciones </td>
        <td> Acciones </td>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>
                {{$user->id}}
            </td>
            <td>
                {{$user->name}}
            </td>
            <td>
                {{$user->level}}
            </td>
            <td>
                {{$user->created_at->format('d-m-y')}}
            </td>
            <td>
                {{$user->updated_at->format('d-m-y')}}
            </td>
            <td>
                <a href="{{route('user.show', $user->id)}}" class="btn btn-primary"> ver </a>
                <a href="{{route('user.edit', $user->id)}}" class="btn btn-secondary"> actualizar </a>

                <form method="POST" action="{{route('user.destroy', $user->id)}}">
                    @method('DELETE')
                    @csrf
                    <button class="btn" type="submit">Eliminar</button>               
                </form>                  
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
@endsection