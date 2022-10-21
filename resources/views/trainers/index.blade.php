@extends('layouts.app')
@section('title', 'Trainer')

@section('content')
    <div class="row">
        @foreach ($t as $trainer)
            <div class="col-sm">
                <div class="card text-center mt-4" style="width: 18rem;">
                    <img style=" margin: 20px; height:100px; width: 100px; background-color:grey"  src="images/{{ $trainer->avatar }}" class="card-img-top rounded-circle mx-auto d-block" alt="">

                    <div class="card-body">
                        <h5 class="card-title">{{ $trainer->name }}</h5>
                        <p class="card-text">{{ $trainer->description }}</p>
                        <a href="/trainer/{{$trainer->slug}}" class="btn btn-primary">ver mas..</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
