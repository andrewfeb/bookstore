<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Untuk melakukan one to many relationship ke tabel publisher
     * Kita menggunakan method belongsTo dikarenakan foreign key ada di tabel books
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    /**
     * Untuk melakukan many to many relationship ke model Genre
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
