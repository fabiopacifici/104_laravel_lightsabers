@extends('layouts.admin')

@section('content')


<section class="show_sabers my-4">
    <div class="container">
        <h4 class="text-muted text-uppercase">All Sabers</h4>
        <a class="btn btn-primary position-fixed bottom-0 end-0 m-4" href="{{route('lightsabers.create')}}">Add Saber</a>


        <div class="card">

            <div class="table-responsive-sm">
                <table class="table table-light mb-0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        @forelse ($sabers as $saber)
                        <tr class="">
                            <td scope="row">{{$saber->id}}</td>
                            <td>
                                <!--  <img width="100" src="{{$saber->cover_image}}" alt=""> -->
                                <img width="100" src="{{ asset('storage/' . $saber->cover_image) }}" alt="">

                            </td>
                            <td>{{$saber->name}}</td>
                            <td>

                                <a href="{{route('lightsabers.show', $saber->id)}}" class="btn btn-primary">View</a>

                                /Edit/Delete
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>


@endsection