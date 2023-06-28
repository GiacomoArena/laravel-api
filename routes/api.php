<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PortfolioController;
use App\Models\Portfolio;

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
Route::namespace('Api')
                ->prefix('portfolios')
                ->group(function(){
                    Route::get('/', [PortfolioController::class, 'index']);
                    Route::get('/type', [PortfolioController::class, 'type']);
                    Route::get('/tech', [PortfolioController::class, 'tech']);
                    Route::get('/{slug}', [PortfolioController::class, 'getDetail']);
                    Route::get('/by-type/{id}', [PortfolioController::class, 'get_by_type']);
                    Route::get('/by-tech/{id}', [PortfolioController::class, 'get_by_tech']);
                });
