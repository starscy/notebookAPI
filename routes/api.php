<?php
declare(strict_types=1);

use App\Http\Controllers\API\NotebookController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], static function () {
    Route::group(['as' => 'notebook.'], static function () {
        Route::controller(NotebookController::class)->group(function () {
            Route::get('/notebook', 'index')->name('index');
            Route::post('/notebook', 'store')->name('store');
            Route::get('/notebook/{id}', 'show')->name('show');
            Route::post('/notebook/{id}', 'update')->name('update');
            Route::delete('/notebook/{id}', 'destroy')->name('destroy');
        });
    });
});

