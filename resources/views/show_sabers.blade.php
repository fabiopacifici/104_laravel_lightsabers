@extends('layouts.app')

@section('content')

<div class="p-5 mb-4 bg-dark text-white rounded-0">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">{{$lightsaber->name}}</h1>
        <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos deserunt doloribus laudantium, quidem assumenda maiores labore, quisquam id consequatur ipsam nisi eaque error magni inventore sapiente totam, illo itaque aspernatur?
        </p>
    </div>
</div>

<div class="container d-flex gap-2">

    <img width="600" class="img-fluid shadow-lg" src="{{$lightsaber->cover_image}}" alt="">

    <div class="text">
        <strong class="text-muted">Description</strong>
        <p class="col-md-8 fs-4">{{$lightsaber->description}}</p>
        <div class="display-3"> ${{$lightsaber->price}}</div>

        <a class="btn btn-success mt-4" href="#" role="button">Buy Now</a>
    </div>




</div>

@endsection