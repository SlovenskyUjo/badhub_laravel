<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class VoteController extends Controller
{
    public function index(Request $request)
    {
        $nickname = $request->query('nickname' , '');
        return Inertia::render('Vote/Vote', [
            'nickname' => $nickname
        ]);
    }
}
