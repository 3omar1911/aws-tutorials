<?php

use App\Http\Controllers\FileExampleController;
use App\Models\Upload;
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

Route::get('/', function () {
    return view('welcome', ['uploads' => Upload::all()]);
});

Route::post('upload', [FileExampleController::class, 'upload']);
Route::get('download/{uploadId}', [FileExampleController::class, 'download']);