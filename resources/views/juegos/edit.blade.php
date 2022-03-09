

@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Formulario de edición de videojuegos</h1>

    <form action="{{ url('/juegos/'.$juego->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{method_field('PATCH')}}
        @include('juegos.form' , ['modo' => 'Editar'])
    </form>

</div>
@endsection

