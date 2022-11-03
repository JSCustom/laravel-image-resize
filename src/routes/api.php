<?php
use Illuminate\Support\Facades\Route;
use JSCustom\LaravelImageResize\Http\Controllers\ImageResize\ImageResizeController;

Route::group(['prefix' => 'image-resize'], function() {
    Route::post('', [ImageResizeController::class, 'imageResize']);
});
?>