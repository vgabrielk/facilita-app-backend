<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class GenreController extends Controller
{

    public function view()
    {
        $genres = Genre::all();
        return view('genres.view', compact('genres'));
    }
}
