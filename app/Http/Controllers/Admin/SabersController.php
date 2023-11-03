<?php

namespace App\Http\Controllers\Admin;


use App\Models\LightSaber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class SabersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // risponde alla rotta /admin/lightsabers (GET)
    {

        return view('admin.lightsabers.index', ['sabers' => LightSaber::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // risponde alla rotta /admin/lightsabers/create (GET)
    {
        return view('admin.lightsabers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // risponde alla rotta /admin/lightsabers (POST)
    {
        //dd($request->all());

        $data = $request->all();
        //$file_path = null;
        if ($request->has('cover_image')) {
            $file_path =  Storage::put('sabers_images', $request->cover_image);
            $data['cover_image'] = $file_path;
        }
        //dd($file_path);


        // Add a new recorin the the db
        /* Without mass assignment of fields
        $saber = new LightSaber();
        $saber->name = $request->name;
        $saber->price = $request->price;
        $saber->cover_image = $file_path;
        $saber->save();
 */
        //With mass assignment
        //dd($data);
        $lightsaber = LightSaber::create($data);

        // LightSaber::fill() // alternativa


        // redirectthe user to a get route, follow the pattern ->  POST/REDIRECT/GET
        // return redirect()->route('lightsabers.index')
        return to_route('lightsabers.index')->with('message', 'Welldone! Saber created successfully 👍'); // new function to_route() laravel 9
    }

    /**
     * Display the specified resource.
     */
    public function show(LightSaber $lightsaber) // risponde alla rotta /admin/lightsabers/x (GET) Mostra il recond con id x
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
    public function edit(LightSaber $lightsaber)
    {
        return view('admin.lightsabers.edit', compact('lightsaber'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LightSaber $lightsaber)
    {
        //dd($request->all());
        $data = $request->all();
        //dd($lightsaber->cover_image);
        //dd($lightsaber);

        if ($request->has('cover_image') && $lightsaber->cover_image) {

            //dd('update the image');
            // delete the previous image
            Storage::delete($lightsaber->cover_image);

            // save the new image and take its path
            $newImageFile = $request->cover_image;
            $path = Storage::put('sabers_images', $newImageFile);
            $data['cover_image'] = $path;
        }

        //dd($data);

        $lightsaber->update($data);
        return to_route('lightsabers.index')->with('message', 'Welldone! Saber updated successfully 👍'); // new function to_route() laravel 9

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LightSaber $lightsaber)
    {
        //dd($lightsaber);
        if (!is_null($lightsaber->cover_image)) {
            Storage::delete($lightsaber->cover_image);
        }
        $lightsaber->delete();
        // POST REDIRECT GET
        return to_route('lightsabers.index')->with('message', 'Welldone! Saber deleted successfully 👍');
    }
}
