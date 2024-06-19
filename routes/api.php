<?php

use App\Http\Controllers\TestMemoryLeakerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/', function () {
    $dt = DB::table('odr_hdr')->select('id', 'odr_num', 'odr_sts', 'pickup_name', 'pickup_phone as phone')->get();
    return response()->json($dt);
});
Route::get('/test-memo', [TestMemoryLeakerController::class, 'test']);
Route::put('/test-data', [TestMemoryLeakerController::class, 'data']);
