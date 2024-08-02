<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinecraftController extends Controller
{
    public function getOnlinePlayers()
    {
        $onlinePlayers = DB::table('authme')->where('isLogged', 1)->count();
        return response()->json(['onlinePlayers' => $onlinePlayers]);
    }
}
