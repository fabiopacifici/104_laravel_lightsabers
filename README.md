# CRUD Ops

- createa Model
- create the migration for the given model
- create resource controller for the given model
- create resource routes
- implement the resource controller methods

## Create a Model

```bash
# create model/migration/seeder
php artisan make:model Lightsaber -ms
```

remember to define the migration and seeders to add some data to the db.
remember to edit .env to connect your db.

## Create Resource Controller

Create a resource controller called LightsabersController inside Admin/ folder (namespace)
and associates it to the Model

```bash
php artisan make:controller Admin/LightsabersController --resource --model=Lightsaber

```

## Create Route Resource

Inside web.php create a route resource for the model. Using the uri as its path and the created controler.

```php


// uri, Controller
Route::resource('admin/lightsabers', LightsabersController::class);

```

⚡ ATTENTION:
Remember to import the controller at the top of the web.php file.

```php
use App\Http\Controllers\Admin\LightsabersController;

//...

```

NOTE:
A route resource can be defined as single routes using all different methods.

```php
/* Versione estesa della route:resource('lightsabers', LightsabersController::class);

// READ
Route::get('/lightsabers', [LightsabersController::class, 'index'])->name('sabers.index');
//CRETE
Route::get('/lightsabers/create', [LightsabersController::class, 'create'])->name('sabers.create');
//CREATE
Route::post('/lightsabers', [LightsabersController::class, 'store'])->name('sabers.store');
//READ
Route::get('/lightsabers/{lightsaber}', [LightsabersController::class, 'show'])->name('sabers.show');

//UPDATE
Route::get('/lightsabers/{lightsaber}/edit', [LightsabersController::class, 'edit'])->name('sabers.edit');

Route::put('/admin/lightsabers/{lightsaber}', [LightsabersController::class, 'update'])->name('sabers.update');

// DELETE
Route::delete('/admin/lightsabers/{lightsaber}', [LightsabersController::class, 'destroy'])->name('sabers.destroy');
*/


```

## implement the resource controller methods

### Implement the index method to show a list of resources

```php

// this responds to the route with a name lightsabers.index as defined by the resource controller

public function index(){
    // implement the logic

    // take all data for the give model from the db
    $sabers = Lightsaber::all();
    // return the view and pass the data to it.
    return view('admin.lightsabers', compact('sabers')); // <-- pay attention to the convention used by laravel

}

```

### Implement the create method

Here we return a view with a form

```php

  /**
     * Show the form for creating a new resource.
     */
    public function create() // risponde alla rotta /admin/lightsabers/create (GET)
    {
        return view('admin.lightsabers.create'); // <-- pay attention to the convention used by laravel
    }

```

We can create a form inside the view called admin/lightsabvers/create

```php
@extends('layouts.admin')


@section('content')

<div class="container">

    //👇 The action must point to the store route that will handle the request to save the record in the db
    <form action="{{route('lightsabers.store')}}" method="POST" enctype="multipart/form-data">
        // use the multipart form data to store files           👆
        <!-- 👇 // Attention to Cross site request forgery attacks -->
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            // Add the name attribute to the inputs 👇
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Acolyte Eco Battle staff">
            <small id="nameHelper" class="form-text text-muted">Type the name here</small>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="99.99">
            <small id="priceHelper" class="form-text text-muted">Type the price here</small>

        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="" aria-describedby="cover_image_helper">
            <div id="cover_image_helper" class="form-text">Upload an image for the current product</div>
        </div>


        <button type="submit" class="btn btn-primary">
            Save
        </button>


    </form>

</div>


@endsection
```

Save the records in the db using `::create`

```php
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


        # Add a new record the the db

        /* Without mass assignment of fields
        $saber = new LightSaber();
        $saber->name = $request->name;
        $saber->price = $request->price;
        $saber->cover_image = $file_path;
        $saber->save();
        */
        
        # With mass assignment
        //dd($data);
        $lightsaber = LightSaber::create($data);


        // redirectthe user to a get route, follow the pattern ->  POST/REDIRECT/GET
        return to_route('lightsabers.show', $lightsaber); // new function to_route() laravel 9
    }

```

⚡⚡ Attention to the mass assignment error!
When using the create mehtod on the Model instance we must add a fillable property inside the model
For instance:

```php
// Lightsaber model
protected $fillable = ['name', 'cover_image', 'description', 'price'];

```

Add inside the array all fileds used in the create form to save the data.
Without the fillable props you won't be able to save that field in the db.
