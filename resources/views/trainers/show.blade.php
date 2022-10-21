@extends('layouts.app')
@section('title', 'Trainer')

@section('content')
    @include('/includes.notificacion')
    
    <img style=" margin: 20px; height:200px; width: 200px; background-color:grey" src="/images/{{ $t->avatar }}"
        class="card-img-top rounded-circle mx-auto d-block">
    <div class="text-center">
        <h5 class="card-title">{{ $t->name }}</h5>
        <p class="card-text">{{ $t->description }}</p>
        <a href="/trainer/{{ $t->slug }}/edit" class="btn btn-primary">Editar</a>



        <form method="POST" action="/trainer/{{ $t->slug }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-4">Eliminar</button>
        </form>

    </div>




@endsection
