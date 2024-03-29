<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoteAuthorController;
use App\Http\Controllers\RatingAuthorController;
use App\Http\Controllers\RatingBookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\NoteBookController;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    // Route::resource('authors', AuthorController::class); //Otra manera de crear rutas

    Route::controller(AuthorController::class)->group(function () {
        Route::get('/authors', 'index');
        Route::post('/authors', 'store');
        Route::get('/authors/generateAutorPDF', 'generateAutorPDF');
        Route::get('/authors/generateAutorPDFRaiting', 'generateAutorPDFRaiting');
        Route::get('/authors/generateExcel', 'generateExcel');
        Route::get('/authors/generateExcelRaitings', 'generateExcelRaitings');
        Route::get('/authors/{id}', 'show');
        Route::put('/authors/{id}', 'update');
        Route::delete('/authors/{id}', 'destroy');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::post('/profiles', 'store');
        Route::put('/profiles/{id}', 'update');
    });

    Route::controller(NoteAuthorController::class)->group(function () {
        Route::get('/authors/{id}/notes', 'index');
        Route::post('/authors/notes', 'store');
        Route::put('/authors/notes/{id}', 'update');
        Route::get('/authors/notes/{id}', 'show');
        Route::delete('/authors/notes/{id}', 'destroy');
        Route::get('/authors/{id}/notes/generatepdf', 'generatePDF');
        Route::get('/authors/{id}/notes/generateexcel', 'generateExcel');
    });

    Route::controller(RatingAuthorController::class)->group(function () {
        Route::post('/authors/ratings', 'store');
        Route::get('/authors/{id}/ratings', 'show');
        Route::put('/authors/ratings/{id}', 'update');
    });

    Route::controller(NoteBookController::class)->group(function () {
        Route::get('/books/{id}/notes', 'index');
        Route::post('/books/notes', 'store');
        Route::put('/books/notes/{id}', 'update');
        Route::get('/books/notes/{id}', 'show');
        Route::delete('/books/notes/{id}', 'destroy');
    });

    Route::controller(RatingBookController::class)->group(function () {
        Route::post('/books/ratings', 'store');
        Route::get('/books/{id}/ratings', 'show');
        Route::put('/books/ratings/{id}', 'update');
    });

    Route::controller(GenreController::class)->group(function () {
        Route::get('/genres', 'index');
        Route::post('/genres', 'store');
        Route::get('/genres/{id}', 'show');
        //Route::get('/genres/{id}', [NoteBookController::class, 'show'])->name('books.notes.show');
        Route::put('/genres/{id}', 'update');
        Route::delete('/genres/{id}', 'destroy');
    });

    Route::controller(PublisherController::class)->group(function () {
        Route::get('/publishers', 'index');
        Route::post('/publishers', 'store');
        Route::get('/publishers/{id}', 'show');
        Route::put('/publishers/{id}', 'update');
        Route::delete('/publishers/{id}', 'destroy');
    });

    Route::controller(BookController::class)->group(function () {
        Route::get('/books', 'index');
        Route::post('/books', 'store');
        Route::get('/books/generatebookpdf', 'generateBookPDF');
        Route::get('/books/generatebookpdfraiting', 'generateBookPDFRaiting');
        Route::get('/books/generateExcel', 'generateExcel');
        Route::get('/books/generateExcelRaitings', 'generateExcelRaitings');
        Route::get('/books/{id}', 'show');
        Route::put('/books/{id}', 'update');
        Route::delete('/books/{id}', 'destroy');
    });
});
