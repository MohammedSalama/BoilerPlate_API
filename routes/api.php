<?php

declare(strict_types=1);

use App\Http\Controllers\FallbackController;
use Illuminate\Support\Facades\Route;

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

/**
 * Version 1
 */

Route::prefix('v1')->as('v1:')->group(
    base_path('routes/v1/api.php')
);

/**
 * Other Version
 */

Route::fallback(FallbackController::class);
