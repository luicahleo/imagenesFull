<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::where('user_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->paginate(4);
        return view('admin.files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'file' => 'required|image'
        ]);

        //return $request->file('file')->store('public/imagenes');

        $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();
// return $nombre;
        $ruta = storage_path() . '\app\public\imagenes/' . $nombre;

        // return $ruta;

        Image::make($request->file('file'))
            ->resize(1000, null, function($constraint){
                $constraint->aspectRatio();
            })
            ->save($ruta);

        // $imagenes =  $request->file('file')->store('public/imagenes');
        // $imagenes =  $request->file('file');
        // $url = Storage::url($imagenes);
        //rescato la imagene y pido que me de su nombre

        $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();

        $ruta = storage_path() . '\app\public\imagenes/' . $nombre;

        // InterventioImagen para redimensionar la imagen.
        // solo paso el ancho 1200 para que alto se redimensione automaticamente
        Image::make($request->file('file'))
            ->resize(1200, null, function($constraint){
                $constraint->aspectRatio();
            })
            ->save($ruta);

        $imagenes =  $request->file('file')->store('public/imagenes');
        $url = Storage::url($imagenes);


        // return $url;

        // almaceno en la BD
        File::create([
            'user_id' => auth()->user()->id,
            'url' => '/storage/imagenes/' . $nombre
        ]);

        // almacenamos en la base de datos
        // File::create([
        //     'url' =>'/storage/imagenes/' . $nombre
        // ]);

        // redirigimos a ver imagenes
        return redirect()->route('admin.files.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($file)
    {
        return view('admin.files.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($file)
    {
        return view('admin.files.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
       // $file = File::where('id',$file)->first();

        // hacemos uso del facade storage para borrar la imagen
        $url = str_replace('storage','public',$file->url);
        Storage::delete($url);

        // ahora borramos el registro de la base datos
        $file->delete();

        return redirect()->route('admin.files.index')->with('eliminar','ok');
    }
}
