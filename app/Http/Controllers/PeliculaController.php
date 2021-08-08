<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pelicula;

use Exception;

class PeliculaController extends ApiController
{
    //Mostrar todas las pelis
    public function index()
    {
        try {
            $Peliculas = Pelicula::where('activo', 1)
            ->select('idPelicula', 'nombre', 'img')
            ->get();
            return $this->sendResponse($Peliculas, "Peliculas obtenidas correctamente");
        } catch (Exception $e) {
            return $this->sendError("Error Conocido", "Error controlado", 200);
        }
    }
    //Craer pelicula
    public function store(Request $request)
    {
        try {
            $Pelicula = new Pelicula();
            $Pelicula->nombre = $request->input('nombre');
            $Pelicula->img = $request->input('img');
            $Pelicula->save();
            return $this->sendResponse($Pelicula, "Pelicula ingresada correctamente");
        } catch (Exception $e) {
            return $this->sendError("Error Conocido", "Error al crear la Pelicula", 200);
        }
    }
    //Mostrar por id
    public function show($id)
    {
        $Pelicula = Pelicula::where('idPelicula', $id)
            ->select('idPelicula', 'nombre', 'img')
            ->get();
        return $this->sendResponse($Pelicula, "Pelicula obtenida correctamente");
    }
}