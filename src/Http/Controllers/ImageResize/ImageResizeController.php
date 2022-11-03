<?php

namespace JSCustom\LaravelImageResize\Http\Controllers\ImageResize;

use JSCustom\LaravelImageResize\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use JSCustom\LaravelImageResize\Providers\HttpServiceProvider;
use Illuminate\Support\Arr;

class ImageResizeController extends Controller
{
    public function imageResize(Request $request)
    {
        $width = $request->width ?? config('image-resize.width');
        $height = $request->height ?? config('image-resize.height');
        $quality = $request->quality ?? config('image-resize.quality');
        $option = 'auto';
        if (Arr::exists(config('image-resize.options'), $request->option)) {
            $option = $request->option;
        }
        dd($request);
        $image = new $this->_imageResize();
        $image->resizeImage($width, $height, $option);
        $image->saveImage($path, $quality);
    }
}