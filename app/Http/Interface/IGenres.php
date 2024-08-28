<?php
namespace App\Http\Interface;

use Illuminate\Http\Request;

interface IGenres
{
    public function index();
    public function create();
    public function store(Request $request);
}
