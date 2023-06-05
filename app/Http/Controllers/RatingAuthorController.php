<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class RatingAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $author = Author::findOrFail($request->author['id']);
            $author->users()->attach($request->user['id'], ['number_star' => $request->number_star]);
            return response()->json(['status' => true, 'message' =>
            'La puntuación del autor ' . $author->full_name . ' fue creado exitosamente']);
        } catch (\Exception $exc) {
            return response()->json(['status' => false, 'message' =>
            'Error al crear el registro' . $exc]);
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
        $author = Author::findOrFail($id);
        return response()->json(['author' => $author, "rating" => $author->users()->where('user_id', '=', auth()->user()->id)->select('userables.*')->get()]);
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
        try {
            $author = Author::findOrFail($request->author['id']);
            $author->users()->updateExistingPivot($request->user['id'],['number_star' => $request->number_star]);
            return response()->json(['status' => true, 'message' => 'La puntuación del autor ' . $author->full_name .' fue actualizado exitosamente' ]);
            } catch (\Exception $exc){
            return response()->json(['status' => false, 'message' =>'Error al actualizar el registro' . $exc]);
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
        //
    }
}
