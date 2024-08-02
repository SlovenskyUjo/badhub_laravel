<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class RuleController extends Controller
{
    public function index()
    {
        return Inertia::render('Rules/Rules');
    }
}
