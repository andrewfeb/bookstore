<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Exception;
use Illuminate\Http\Request;

class PublishersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPublishers = Publisher::paginate(5, ['id', 'publisher', 'created_at']);

        return view('publisher.index', [
            'publishers' => $dataPublishers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama-publisher' => 'required'
        ]);

        try{
            Publisher::create([
                'publisher' => $request->input('nama-publisher')
            ]);

            return to_route('publishers.index')->with('success', 'Data publisher berhasil disimpan');
        }catch(Exception $e) {
            return to_route('publishers.index')->with('error', 'Data publisher gagal disimpan');
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
    public function edit(Publisher $publisher)
    {
        return view('publisher.edit', [
            'publisher' => $publisher
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        $request->validate([
            'nama-publisher' => 'required'
        ]);

        try{
            $publisher->update([
                'publisher' => $request->input('nama-publisher')
            ]);

            return to_route('publishers.index')->with('success', 'Data publisher berhasil diupdate');
        }catch(Exception $e) {
            return to_route('publishers.index')->with('error', 'Data publisher gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return to_route('publishers.index')->with('success', 'Data berhasil dihapus');
    }
}
