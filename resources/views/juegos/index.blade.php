<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/index.css">
    <title>Index | PracticaLaravel</title>
</head>
<body>
    @extends('layouts.app')
    
    @section('content')
    <div class="container">

        <div class="container">
            

            @if(Auth::check(session('bienvenida')))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Bienvenido a PracticaLaravel <span style='font-size:25px;'>&#127773;</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('status')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('borrado'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('borrado')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h1 style="text-align:center; padding-top: 10vh;">Consulta de videojuegos</h1>
            <table class="table table-striped">

                <thead>
                    <tr>

                    <th scope="col">#</th>
                    <th scope="col">Imagen del juego</th>    
                    <th scope="col">Nombre</th>
                    <th scope="col">Clasificación</th>
                    <th scope="col">Consola</th>
                    <th scope="col">Precio Adquisición</th>
                    <th scope="col">Precio Venta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($juegos as $juego)
                        <tr>
                            <td>{{ $juego->id }}</td>
                            <td >
                                
                            @if (!empty($juego->imagenJuego))
                                <img src="{{ asset('storage').'/'.$juego->imagenJuego }}" alt=""
                                style="width: 150px; height: 180px; border-radius: 5px;">                               
                            @endif 

                            @if (empty($juego->imagenJuego))
                                <small
                                style="color: #CACFD2;
                                font-size: 10px;">
                                <small>Imagen no disponible</small>  
                            @endif 
                            
                            </td>
                            <td>{{ $juego->NombreJuego }}</td>
                            <td>{{ $juego->Clasificacion }}</td>
                            <td>{{ $juego->Consola }}</td>
                            <td>${{ $juego->PrecioAd }}</td>
                            <td>${{ $juego->PrecioVen }}</td>

                            <td>
                                <a href="{{ url('/juegos/'.$juego->id.'/edit') }}"><button type="button" class="btn btn-info">Editar</button></a>
                            <td>

                                <form action="{{ route('juegos.destroy' , $juego->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="submit" value="Borrar" class="btn btn-danger" onclick="return confirm('¿Quieres borrar este juego?')">
                                </form>
                                
                            </td>    
                        </tr> 
                    @endforeach
                </tbody>
            </table>        
          <div >
            {{ $juegos->links()}}
              <a class="d-grid gap-2" href="{{ route('juegos.create') }}">
                <button type="button" class="btn btn-success">Agregar Videojuego</button>
              </a>
          </div>        
        </div>

    </div>
    @endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>