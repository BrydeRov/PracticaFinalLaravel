@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Formulario de creación de videojuegos</h1>
        @include('juegos.form' , ['modo' => 'Crear'])
        
    </div>
@endsection