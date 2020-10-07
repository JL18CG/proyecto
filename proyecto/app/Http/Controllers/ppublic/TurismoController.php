<?php

namespace App\Http\Controllers\ppublic;
use Image;
use App\Sitio;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TurismoController extends Controller
{
    public function index(){
        $sitios = Sitio::orderBy('created_at', 'desc')->paginate(10);        
        return view('pagina.turismo.index', compact('sitios'));
    }
}
