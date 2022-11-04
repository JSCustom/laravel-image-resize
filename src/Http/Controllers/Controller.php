<?php

namespace JSCustom\LaravelImageResize\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use JSCustom\LaravelImageResize\Helpers\ImageResize;

class Controller extends BaseController
{
    public function __construct(
        \JSCustom\LaravelImageResize\Services\LaravelImageResizeService $LaravelImageResizeService
    ) {
        $this->_laravelImageResizeService = $LaravelImageResizeService;
    }
}