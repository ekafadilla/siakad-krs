
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KrsController;

Route::get('/', function () {
    return redirect()->route('krs.index');
});

Route::get('/krs', [KrsController::class, 'index'])
    ->name('krs.index');
