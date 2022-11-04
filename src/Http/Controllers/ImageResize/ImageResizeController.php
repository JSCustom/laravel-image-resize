<?php

namespace JSCustom\ImageResize\Http\Controllers\ImageResize;

use JSCustom\ImageResize\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class ImageResizeController extends Controller
{
    public function imageResize(Request $request)
    {
        $result = $this->_imageResizeService->imageResize($request);
        return response(['status' => $result->status, 'code' => $result->code, 'message' => $result->message, 'payload' => $result->image ? ['image' => $result->image] : []], $result->code);
    }
}