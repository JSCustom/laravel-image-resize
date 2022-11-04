<?php

namespace JSCustom\LaravelImageResize\Http\Controllers\ImageResize;

use JSCustom\LaravelImageResize\Http\Controllers\Controller as Controller;
use JSCustom\LaravelImageResize\Providers\HttpServiceProvider;
use JSCustom\LaravelImageResize\Helpers\ImageResize;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Exception;

class ImageResizeController extends Controller
{
    public function imageResize(Request $request)
    {
        $result = $this->_laravelImageResizeService->imageResize($request);
    }
}