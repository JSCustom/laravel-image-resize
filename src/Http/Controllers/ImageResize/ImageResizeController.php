<?php

namespace JSCustom\LaravelImageResize\Http\Controllers\ImageResize;

use JSCustom\LaravelImageResize\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class ImageResizeController extends Controller
{
    public function imageResize(Request $request)
    {
        $result = $this->_laravelImageResizeService->imageResize($request);
        return response(['status' => $result->status, 'code' => $result->code, 'message' => $result->message, 'payload' => $result->image ? ['image' => $result->image] : []], $result->code);
    }
}