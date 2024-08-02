<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class StoreController extends Controller
{
    public function show()
    {
        // Generovanie URL
        $url = 'https://vip.vagonbrei.eu/link/LAkWETe4mc';

        // Odovzdanie URL do Blade šablóny
        return Inertia::render('Store/Store', ['url' => $url]);
    }
}
