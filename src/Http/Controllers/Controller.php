<?php

namespace JSCustom\ImageResize\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use JSCustom\ImageResize\Helpers\ImageResize;

class Controller extends BaseController
{
    public function __construct(
        \JSCustom\ImageResize\Services\ImageResizeService $ImageResizeService
    ) {
        $this->_imageResizeService = $ImageResizeService;
    }
}