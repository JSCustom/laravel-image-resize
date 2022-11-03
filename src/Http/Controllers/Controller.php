<?php

namespace JSCustom\LaravelImageResize\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function __construct(
        \JSCustom\LaravelImageResize\Helpers\ImageResize $ImageResize
    ) {
        $this->_imageResize = $ImageResize;
    }
}