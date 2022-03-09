
  <div class="formulario mb-3">
      <form action="{{ url('/juegos') }}" method="POST" enctype="multipart/form-data">


          @csrf

          
          

          <div class="form-floating mb-3">
              <input
              class="form-control"
              type="text" 
              name="NombreJuego" 
              id="floatingInput" 
              placeholder="Nombre de Videojuego" 
              value="{{ isset($juego->NombreJuego) ? $juego->NombreJuego: ''}}" 
              class="form-control form-control-sm"
              aria-label=".form-control-sm example"
              required
              >
              <label for="floatingInput">Nombre de Videojuego</label>
          </div>

          <div class="form-floating mb-3">
              
              <input 
              class="form-control" 
              id="floatingInput" 
              type="text" 
              name="Clasificacion" 
              id="Clasificacion" 
              placeholder="Clasificacion" 
              value="{{ isset($juego->Clasificacion) ? $juego->Clasificacion: ''}}" 
              class="form-control form-control-sm"
              aria-label=".form-control-sm example"
              required
              > 
              <label for="floatingInput">Clasificación</label>
            </div> 

            <div class="form-floating mb-3">
              <input 
              class="form-control" 
              id="floatingInput"
              type="text" 
              name="Consola" 
              id="Consola" 
              placeholder="Consola" 
              value="{{ isset($juego->Consola) ? $juego->Consola: '' }}" 
              class="form-control form-control-sm"
              aria-label=".form-control-sm example"
              required
              >
              <label for="floatingInput">Consola</label>
            </div>

            <div class="form-floating mb-3">
              <input 
              class="form-control" 
              id="floatingInput" 
              type="number" 
              name="PrecioAd" 
              id="PrecioAd"
              placeholder="Precio Adquisición" 
              value="{{ isset($juego->PrecioAd) ? $juego->PrecioAd: '' }}" 
              class="form-control form-control-sm"
              aria-label=".form-control-sm example"
              step="0.01"
              required
              >
              <label for="floatingInput">Precio Adquisición</label>
            </div>
          
            <fieldset disabled>
            <div class="form-floating mb-3">
              <input 
              class="form-control" 
              id="floatingInput" 
              type="number" 
              name="PrecioVen" 
              id="PrecioVen"
              placeholder="{{ isset($juego->PrecioVen) ? $juego->PrecioVen: ''}}" 
              value="{{ isset($juego->PrecioVen) ? $juego->PrecioVen: '' }}" 
              class="form-control form-control-sm"
              aria-label=".form-control-sm example"
              step="0.01"
              required
              >
              <label for="floatingInput">Precio Ventas</label>
            </div>
          </fieldset>

          <div class="mb-3">
            <label for="formFile" class="form-label">Imagen del juego</label>

            <div>

              @if(!empty($juego->imagenJuego))
                <img class="imagenJuegoEdit" src="{{ asset('storage'.'/'.$juego->imagenJuego) }}" alt="">
              @endif  

            <input 
              name="imagenJuego" 
              class="form-control" 
              type="file" 
              id="formFile" 
              value="{{ isset($juego->imagenJuego) ? $juego->imagenJuego: ''}}" >
            </div>

            
          </div>
          
          
          @if(count($errors) > 0)
              <div class="alert alert-danger" role="alert">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <br>

          <button class="btn btn-success" type="submit" value="Guardar Datos">{{$modo}} Datos</button>
          <a href="{{route('juegos.index') }}" class="btn btn-primary">Regresar</a>
          
      </form>
  </div>
