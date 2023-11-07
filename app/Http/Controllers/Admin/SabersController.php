<?php

namespace App\Http\Controllers\Admin;


use App\Models\LightSaber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreLightsaberRequest;
use App\Http\Requests\UpdateLightsaberRequest;

class SabersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index() // risponde alla rotta /admin/lightsabers (GET)
    {
        // Show also trashed results in the table using ['sabers' => LightSaber::withTrashed()->get()]
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
    public function store(StoreLightsaberRequest $request) // risponde alla rotta /admin/lightsabers (POST)
    {

        //dd($request->all());

        /* Validation inside the controller method
         $val_data = $request->validate([
            'name' => 'required|min:3|max:50',
            'price' => 'nullable',
            'cover_image' => 'nullable|image|max:100'

        ]); */

        //validate all fields
        //dd($val_data);
        //$data = $request->all();


        # Validation with formRequest
        $val_data = $request->validated();

        //$file_path = null;
        if ($request->has('cover_image')) {
            $file_path =  Storage::put('sabers_images', $request->cover_image);
            $val_data['cover_image'] = $file_path;
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
        //dd($val_data);
        LightSaber::create($val_data);

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
    public function update(UpdateLightsaberRequest $request, LightSaber $lightsaber)
    {


        //dd($request->all());
        // Validate data
        /*      $val_data = $request->validate([
            'name' => 'required|min:3|max:50',
            'price' => 'nullable',
            'cover_image' => 'nullable|image|max:100'
        ]); */

        //dd($val_data);

        //$data = $request->all();
        //dd($lightsaber->cover_image);
        //dd($lightsaber);

        $val_data = $request->validated();

        //dd($request->has('cover_image'), $lightsaber->cover_image);




        // if the request has a cover image key
        if ($request->has('cover_image')) {
            // - save the image inside the filesysem
            $newImageFile = $request->cover_image;
            $path = Storage::put('sabers_images', $newImageFile);
            // check if the db has a cover_image not null
            if (!is_null($lightsaber->cover_image) && Storage::fileExists($lightsaber->cover_image)) {
                // delete it and save it to the val_data
                Storage::delete($lightsaber->cover_image);
            }
            $val_data['cover_image'] = $path;
        }


        // Here we have a filesystem instance insteam of the file path
        //dd($val_data);

        $lightsaber->update($val_data);
        return to_route('lightsabers.index')->with('message', 'Welldone! Saber updated successfully 👍'); // new function to_route() laravel 9

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LightSaber $lightsaber)
    {
        //dd($lightsaber);
        // T Handle the soft deletion case for the image file
        if (!is_null($lightsaber->cover_image)) {
            Storage::delete($lightsaber->cover_image);
        }
        $lightsaber->delete();
        // POST REDIRECT GET
        return to_route('lightsabers.index')->with('message', 'Welldone! Saber deleted successfully 👍');
    }
}
