<?php

use App\Http\Controllers\DiscordController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MinecraftController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VoteController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/api/players/online', [MinecraftController::class, 'getOnlinePlayers']);
Route::get('/invite-data', [DiscordController::class, 'getInviteData']);

Route::get('/team', [TeamController::class, 'index'])->name('team.show');
Route::get('/hlasovani', [VoteController::class, 'index'])->name('vote.show');
Route::get('/store', [StoreController::class, 'show'])->name('store.show');
Route::get('/pravidla', [RuleController::class, 'index'])->name('rules.show');
Route::get('/mapa', [MapController::class, 'index'])->name('map.show');
require __DIR__.'/auth.php';
