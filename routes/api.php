<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Lightit\Backoffice\Users\App\Controllers\{
    DeleteUserController, GetUserController, ListUserController, StoreUserController
};


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/
Route::prefix('users')
    ->name('users.')
    ->middleware([])
    ->group(static function (): void {
        Route::get('/', ListUserController::class)->name('list');
        Route::get('/{user}', GetUserController::class)->withTrashed()->whereNumber('user')->name('get');
        Route::post('/', StoreUserController::class)->name('store');
        Route::delete('/{user}', DeleteUserController::class)->whereNumber('user')->name('delete');
    });
