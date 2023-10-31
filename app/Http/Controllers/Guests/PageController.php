<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use App\Models\LightSaber;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function index()
    {
        return view('welcome');
    }
    function about()
    {
        return view('about');
    }

    function lightsabers()
    {

        return view('sabers', ['sabers' => LightSaber::all()]);
    }

    function showLightsabers(LightSaber $lightsaber)
    {
        //dd($lightsaber);

        //$saber = LightSaber::find($id);
        //dd($saber);
        return view('show_sabers', compact('lightsaber'));
    }
}
