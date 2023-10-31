@extends('layouts.app')



@section('content')
<section class="sabers py-5">
    <div class="container">
        <div class="row row-cols-md-3 g-3">

            @forelse ($sabers as $saber)
            <div class="col">
                <div class="card">
                    <!-- <img class="card-img-top" src="{{$saber->cover_image}}" alt=""> -->
                    <img class="card-img-top" src="{{ asset('storage/' . $saber->cover_image) }}" alt="">

                    <div class="card-body">
                        <h3>{{$saber->name}}</h3>
                        <a href="{{route('guests.lightsabers.show', $saber->id)}}">View</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col">
                <p>No sabers in the shop yet!</p>
            </div>

            @endforelse
        </div>
    </div>
</section>
@endsection