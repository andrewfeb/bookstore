<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* untuk mendapatkan data book serta data publisher dan genre yang berelasi dengan data book tersebut
            method with untuk mendapatkan data publisher dan genre dan pemanggilannya berdasarkan nama method pada model Book
        */
        $books = Book::with('publisher', 'genres')->paginate(5);

        return view('book.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishers = Publisher::get(['id', 'publisher']);
        $genres = Genre::get(['id', 'genre']);

        return view('book.create', [
            'publishers' => $publishers,
            'genres' => $genres
        ]);
    }

    private function validation(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'isbn' => 'digits:13',
            'publish-date' => 'required',
            'author' => 'required',
            'publisher' => 'in:' . implode(",", Arr::flatten(Publisher::get('id')->toArray())),
            'price' => 'required|numeric',
            'cover' => 'required|image|max:1024'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validation($request);
        /* DB transaction digunakan agar insert data ke database konsisten jika insert ke 2 atau lebih tabel
           jika salah satu proses insert ke tabel gagal maka semua proses akan di rollback
           jika semua proses berhasil akan di commit untuk disimpan ke database
        */
        DB::transaction(function () use ($request) {
            if ($request->hasFile('cover') && $request->file('cover')->isValid()) { // Pengecekan apakah file berhasil diupload
                /*
                Menyimpan file ke storage/app/public/cover
                Parameter ke 2 pada method store agar bisa diakses secara public
                jalankan perintah php artisan storage:link (hanya satu kali aja)
                */
                $path = $request->file('cover')->store('cover', 'public'); // return path

                // Save ke tabel books
                $newBook = Book::create([
                    'title' => $request->input('title'),
                    'isbn' => $request->input('isbn'),
                    'publish_date' => $request->input('publish-date'),
                    'author' => $request->input('author'),
                    'publisher_id' => $request->input('publisher'),
                    'price' => $request->input('price'),
                    'cover' => $path
                ]); // return model book yang dicreate
                /* Save ke tabel book_genre
                    genres(): method ini dibuat dan dipanggil dari Model Book
                    attach: method ini digunakan untuk insert ke pivot tabel
                */
                $newBook->genres()->attach($request->input('genre'));
            }
        });
        return to_route('books.index')->with('success', 'Data book berhasil disimpan');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
