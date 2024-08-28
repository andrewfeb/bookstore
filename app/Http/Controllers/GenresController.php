<?php

namespace App\Http\Controllers;

use App\Http\Interface\IGenres;
use App\Models\Genre;
use Exception;
use Illuminate\Http\Request;

class GenresController extends Controller implements IGenres
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$dataGenres = Genre::get(['id','genre','created_at']);

        $dataGenres = Genre::paginate(5, ['id', 'genre', 'created_at']);

        return view('genre.index', [
            'genres' => $dataGenres
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.create');
    }

    private function validation(Request $request)
    {
        $request->validate([
            'nama-genre' => 'required|min:3'
        ],[
            'nama-genre.required' => 'Nama genre harus diisi',
            'nama-genre.min' => 'Nama genre minimal 3 karakter'
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validation($request);
        try{
            Genre::create([
                'genre' => $request->input('nama-genre')
            ]);

            return to_route('genres.index')->with('success', 'Data genre berhasil disimpan');
        }catch(Exception $e) {
            return to_route('genres.index')->with('error', $e->getMessage()());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('genre.edit', [
            'genre' => $genre
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $this->validation($request);
        try{
            $genre->update([
                'genre' => $request->input('nama-genre')
            ]);

            return to_route('genres.index')->with('success', 'Data genre berhasil diupdate');
        }catch(Exception $e) {
            return to_route('genres.index')->with('error', $e->getMessage()());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return to_route('genres.index')->with('success', 'Data berhasil dihapus');
    }
}
