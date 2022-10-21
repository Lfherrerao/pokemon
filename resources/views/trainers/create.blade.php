@extends('layouts.app')
@section('title', 'Triner')

@section('content')


    <form method="POST" action="/trainer" enctype="multipart/form-data">


        @csrf


        @if ($errors->any())

            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="mb-3">
            <label>nombre</label>
            <input type="text" class="form-control" name="name" aria-describedby="ingrese nombre">
        </div>

        <div class="mb-3">
            <label for="">descripción</label>
            <textarea name="description" class="form-control " cols="30" rows="10"></textarea>
        </div>


        <div class="mb-3">
            <label for="">avatar</label>
            <input type="file" name="avatar">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>

@endsection
