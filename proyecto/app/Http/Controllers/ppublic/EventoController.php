<?php

namespace App\Http\Controllers\ppublic;
use Image;
use App\Evento;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(){
        $eventos = Evento::orderBy('created_at', 'desc')->paginate(10);        
        return view('pagina.eventos.index', compact('eventos'));
    }
}
