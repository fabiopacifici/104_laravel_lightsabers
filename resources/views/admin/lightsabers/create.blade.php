@extends('layouts.admin')


@section('content')

<div class="container">
    @include('partials.errors')

    <form action="{{route('lightsabers.store')}}" method="POST" enctype="multipart/form-data">

        <!-- // Attention to Cross site request forgery attacks -->
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="helpId" placeholder="Acolyte Eco Battle staff" maxlength="50" required value="{{old('name')}}">
            <small id="nameHelper" class="form-text text-muted">Type the name here</small>
            @error('name')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control  @error('price') is-invalid @enderror" name="price" id="price" aria-describedby="helpId" placeholder="99.99" require value="{{old('price')}}">
            <small id="priceHelper" class="form-text text-muted">Type the price here</small>
            @error('price')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Choose file</label>
            <input type="file" class="form-control  @error('cover_image') is-invalid @enderror" name="cover_image" id="cover_image" placeholder="" aria-describedby="cover_image_helper">
            <div id="cover_image_helper" class="form-text">Upload an image for the current product</div>
            @error('cover_image')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Save
        </button>


    </form>

</div>


@endsection
