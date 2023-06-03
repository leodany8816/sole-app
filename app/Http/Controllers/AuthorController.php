<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Author::orderBy('full_name', 'asc')->get();
        return response()->json($author);
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
            $author = new Author();
            $author->full_name = $request->full_name;
            $author->birth_date = $request->birth_date;
            $author->country = $request->country;
            $image_name = $this->loadImage($request);
            $author->save();
            $image_name = $this->loadImage($request);
            if ($image_name != '') {
                $author->image()->create(['url' => 'images/' . $image_name]);
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => 'El autor ' . $author->full_name . ' fue creado exitosamente. ']);
        } catch (\Exception $exc) {
            return response()->json(['status' => false, 'message' => 'Error al crear el registro ' . $exc]);
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
        //$author = Author::find($id);
        $author = Author::with(['profile'])->where('id', '=', $id)->first();
        return response()->json($author);
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
            $author = Author::findOrFail($id);
            $author->full_name = $request->full_name;
            $author->birth_date = $request->birth_date;
            $author->country = $request->country;
            $author->save();
            return response()->json(['status' => true, 'message' => 'El author ' . $author->full_name . ' fue actualizado correctamente']);
        } catch (\Exception $exc) {
            return response()->json(['status' => false, 'message' => 'Error al editar el registro ' . $exc]);
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
            $author = Author::findOrFail($id);
            $author->delete();
            if ($author->image()) {
                $author->image()->delete();
            }
            return response()->json(['status' => true, 'message' => 'Elautor ' . $author->full_name . ' fue eliminado exitosamente']);
        } catch (\Exception $exc) {
            return response()->json(['status' => false, 'message' => 'Error al eliminar el registro ' . $exc]);
        }
    }

    public function loadImage($request)
    {
        $image_name = '';
        if ($request->hasFile('image')) {
            $destination_path = 'public/images';
            $image = $request->file('image');
            $image_name = time() . '_' . $image->getClientOriginalName();
            $request->file('image')->storeAs($destination_path, $image_name);
        }
        return $image_name;
    }
}
