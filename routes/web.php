<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/storage/vehicules/images/{file}', function ($file) {
//     $path = storage_path("app/public/vehicules/images/{$file}");

//     if (!file_exists($path)) {
//         abort(404);
//     }

//     return response()->file($path, [
//         'Content-Type' => 'image/png',
//         'Cache-Control' => 'public, max-age=31536000'
//     ]);
// })->where('file', '.*');

Route::get('/storage/vehicules/images/{file}', function ($file) {
    $path = storage_path("app/public/vehicules/images/{$file}");

    if (!file_exists($path)) {
        abort(404);
    }

    $mimeType = File::mimeType($path);

    // Correction pour les PDF si nécessaire
    if (str_ends_with(strtolower($file), '.pdf')) {
        $mimeType = 'application/pdf';
    }

    return response()->file($path, [
        'Content-Type' => $mimeType,
        'Cache-Control' => 'public, max-age=31536000'
    ]);
})->where('file', '.*');

