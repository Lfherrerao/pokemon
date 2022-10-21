@extends('layouts.app')
@section('title', 'Triner')

@section('content')


    <form method="POST" action="/trainer/{{$t->slug}}" enctype="multipart/form-data">
        
        @method('PUT')
        @csrf


    <!--  <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

    <img style=" margin: 20px; height:200px; width: 200px; background-color:grey" src="/images/{{ $t->avatar }}"
    class="card-img-top rounded-circle mx-auto d-block">

        <div class="mb-3">
            <label for="" >nombre</label>
            <input type="text"  value="{{$t->name }}" class="form-control" name="name" aria-describedby="ingrese nombre">
        </div>

        <div class="mb-3">
            <label for="">descripción</label>
            <textarea   name="description" class="form-control "  cols="10" rows="3">{{$t->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="">avatar</label>
            <input type="file" name="avatar">
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>

@endsection
