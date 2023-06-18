<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

/**
 * Class PeliculaController
 * @package App\Http\Controllers
 */
class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::paginate();

        return view('pelicula.index', compact('peliculas'))
            ->with('i', (request()->input('page', 1) - 1) * $peliculas->perPage());
    }
    // public function index2()
    // {
    //     $peliculas = Pelicula::all();
    //     return view("index", compact('peliculas'));
    // }

    public function index2(Request $request)
    {
        $peliculas = Pelicula::all();
        if($request->has('search')){
            $peliculas=Pelicula::where('titulo', 'like', "%{$request->input('search')}%")->get();
            $peliculas->where('name', 'like', "%{$request->get('search')}%");
        }
        return view('index', compact('peliculas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelicula = new Pelicula();
        return view('pelicula.create', compact('pelicula'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pelicula::$rules);

        $pelicula = Pelicula::create($request->all());

        return redirect()->route('pelicula.index')
            ->with('success', 'Pelicula created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula = Pelicula::find($id);
        return view('pelicula.show', compact('pelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelicula = Pelicula::find($id);

        return view('pelicula.edit', compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pelicula $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        request()->validate(Pelicula::$rules);

        $pelicula->update($request->all());

        return redirect()->route('pelicula.index')
            ->with('success', 'Pelicula updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::find($id)->delete();

        return redirect()->route('pelicula.index')
            ->with('success', 'Pelicula deleted successfully');
    }

    public function show2($id)
    {
        $peliculas = Pelicula::find($id);
        return view('peliculas.show', compact('peliculas'));
    }
  
}
