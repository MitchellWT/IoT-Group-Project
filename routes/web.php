<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorSystemController;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\APIDataController;
use App\Http\Controllers\AWSIoTRuleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/info', [SensorSystemController::class, 'info'])
->name('info');

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth'])
->name('admin');

Route::get('/sensorsystems', [SensorSystemController::class, 'index'])
->middleware(['auth'])
->name('SensorSystems.index');

Route::get('/sensorsystems/{sensorSystem}/show', [SensorSystemController::class, 'show'])
->middleware(['auth'])
->name('SensorSystems.show');

Route::get('/awsiotrules', [AWSIoTRuleController::class, 'index'])
->middleware(['auth'])
->name('AWSIoTRules.index');

Route::get('/awsiotrules/{awsiotrule}/show', [AWSIoTRuleController::class, 'show'])
->middleware(['auth'])
->name('AWSIoTRules.show');

Route::get('/sediotrules/{awsiotrule}/edit', [AWSIoTRuleController::class, 'edit'])
->middleware(['auth'])
->name('AWSIoTRules.edit');

Route::put('/sediotrules/{awsiotrule}/update', [AWSIoTRuleController::class, 'update'])
->middleware(['auth'])
->name('AWSIoTRules.update');

Route::get('/awsiotrules/create', [AWSIoTRuleController::class, 'create'])
->middleware(['auth'])
->name('AWSIoTRules.create');

Route::post('/awsiotrules/store', [AWSIoTRuleController::class, 'store'])
->middleware(['auth'])
->name('AWSIoTRules.store');

Route::delete('/awsiotrules/{awsiotrule}/delete', [AWSIoTRuleController::class, 'delete'])
->middleware(['auth'])
->name('AWSIoTRules.delete');

require __DIR__.'/auth.php';
