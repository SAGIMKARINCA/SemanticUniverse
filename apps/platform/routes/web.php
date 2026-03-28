<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/semantic-universe'));
Route::get('/SemanticUniverse', fn () => redirect('/semantic-universe'));

Route::get('/semantic-universe', function (Request $request) {
    $isGodMode = $request->session()->get('semantic_universe_mode') === 'godmode';
    $godModeProfile = [
        'name' => 'GodMode Super Admin',
        'role' => 'System Ana Yukleyicisi',
        'scope' => 'SemanticUniverse Core',
    ];

    return view('semantic-universe.shell', [
        'isGodMode' => $isGodMode,
        'godModeProfile' => $godModeProfile,
    ]);
})->name('semantic-universe.home');

Route::get('/semantic-universe/godmode-login', function (Request $request) {
    $request->session()->put('semantic_universe_mode', 'godmode');

    return redirect()->route('semantic-universe.home');
})->name('semantic-universe.login');

Route::get('/semantic-universe/logout', function (Request $request) {
    $request->session()->forget('semantic_universe_mode');

    return redirect()->route('semantic-universe.home');
})->name('semantic-universe.logout');
