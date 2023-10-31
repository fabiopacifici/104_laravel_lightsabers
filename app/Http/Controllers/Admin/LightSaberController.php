<?php

namespace App\Http\Controllers\Admin;


use App\Models\LightSaber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LightSaberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.lightsabers.index', ['sabers' => LightSaber::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.lightsabers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $file_path = null;
        if ($request->has('cover_image')) {
            $file_path =  Storage::put('sabers_images', $request->cover_image);
        }
        //dd($file_path);


        $saber = new LightSaber();
        $saber->name = $request->name;
        $saber->price = $request->price;
        $saber->cover_image = $file_path;
        $saber->save();

        // POST/REDIRECT/GET
        return to_route('lightsabers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(LightSaber $lightsaber)
    {
        //dd($lightsaber);
        /*  $lightSaber = LightSaber::find($id);
        //dd($lightSaber);
        if ($lightSaber) {
            return view('admin.lightsabers.show', compact('lightSaber'));
        }
        abort(404); */
        return view('admin.lightsabers.show', compact('lightsaber'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LightSaber $lightSaber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LightSaber $lightSaber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LightSaber $lightSaber)
    {
        //
    }
}
