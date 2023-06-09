<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::orderby('name', 'asc')->get();
        return response()->json($genres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:70|unique:genres',
        ]);
        try {
            $genre = new Genre();
            $genre->name = $request->name;
            $genre->description = $request->description;
            $genre->save();
            return response()->json(['status' => true, 'message' => 'El genero ' . $genre->name . ' fue creado exitosamente']);
        } catch (\Exception $exc) {
            return response()->json(['status' => false, 'message' => 'Error al crear genero']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genre = Genre::find($id);
        return response()->json($genre);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:70|unique:genres,name,' . $id,
        ]);
        try {
            $genre = Genre::findOrFail($id);
            $genre->name = $request->name;
            $genre->description = $request->description;
            $genre->save();
            return response()->json(['status' => true, 'message' => 'El genero ' . $genre->name . ' fue actualizado exitosamente']);
        } catch (\Exception $exc) {
            return response()->json(['status' => false, 'message' => 'Error al editar el registro' . $exc]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $genre = Genre::findOrFail($id);
            $genre->delete();
            return response()->json(['status' => true, 'message' => 'El genero ' . $genre->name . ' fue eliminado exitosamente']);
        } catch (\Exception $exc) {
            return response()->json(['status' => false, 'message' => 'Error al eliminar el registro']);
        }
    }
}
