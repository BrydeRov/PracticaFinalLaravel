<?php

namespace App\Http\Controllers;

use App\Models\Juegos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class JuegosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['juegos']=Juegos::paginate(5);
        return view('juegos.index' , $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('juegos.create');
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosJuego = request()->except('_token');
        $datosJuego += ['precioVen' => $datosJuego['PrecioAd'] * 1.4];
        if($request->hasFile('imagenJuego')){
            $datosJuego['imagenJuego']=$request->file('imagenJuego')->store('imagenesJuegos' , 'public');
        }
        Juegos::insert($datosJuego);
        response()->json($datosJuego);
        return redirect(route('juegos.index'))->with('status' , 'Editado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Juegos  $juegos
     * @return \Illuminate\Http\Response
     */
    public function show(Juegos $juegos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Juegos  $juegos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $juego = Juegos::findOrFail($id);
        return view('juegos.edit' , compact('juego'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Juegos  $juegos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosJuego=request()->except('_token' , '_method');
        if($request->hasFile('imagenJuego')){

            $juego=Juegos::findOrFail($id);
            Storage::delete('public/'.$juego->imagenJuego);
            $datosJuego['imagenJuego']=$request->file('imagenJuego')->store('imagenesJuegos' , 'public');

        }
        Juegos::where('id','=',$id)->update($datosJuego);
        
        $juego=Juegos::findOrFail($id);
        return redirect(route('juegos.index'))->with('status' , 'Editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juegos  $juegos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        
        Juegos::destroy($id);        
        return redirect('juegos')->with('borrado' , 'Videojuego borrado exitosamente');
    }
}
