@extends('layouts.admin')

@section('content')


<section class="show_sabers my-4">
    <div class="container">


        @if(session('message'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Success!</strong> {{session('message')}}
        </div>

        @endif




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
                            <td scope="row">
                                {{$saber->id}}


                                <!-- Works only is using withTrashed()->get() to return the data to this view -->
                                @if($saber->trashed())
                                I was trashed
                                @endif
                            </td>
                            <td>
                                <!--  <img width="100" src="{{$saber->cover_image}}" alt=""> -->
                                <img width="100" src="{{ asset('storage/' . $saber->cover_image) }}" alt="">

                            </td>
                            <td>{{$saber->name}}</td>
                            <td>

                                {{--<!-- Different options to do the same thing
                                <a href="{{route('lightsabers.show', $saber->id)}}" class="btn btn-primary">View</a>
                                <a href="{{route('lightsabers.show', $saber)}}" class="btn btn-primary">View</a>
                                <a href="{{route('lightsabers.show', ['id' => $saber->id)}}" class="btn btn-primary">View</a>
                                <a href="{{route('lightsabers.show', ['id' => $saber)}}" class="btn btn-primary">View</a>-->
                                --}}
                                <a href="{{route('lightsabers.show', $saber->id)}}" class="btn btn-primary">View</a>
                                <a href="{{route('lightsabers.edit', $saber->id)}}" class="btn btn-secondary">Edit</a>


                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalId-{{$saber->id}}">
                                    Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{$saber->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$saber->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-{{$saber->id}}">Modal id: {{$saber->id}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Attention! This is a destructive operation that cannot be undone.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                <!-- Delete form -->
                                                <form action="{{route('lightsabers.destroy', $saber->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Confirm</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                            </td>
                        </tr>
                        @empty
                        <tr class="">

                            <td>Oops! No sabers yet!</td>

                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>


@endsection