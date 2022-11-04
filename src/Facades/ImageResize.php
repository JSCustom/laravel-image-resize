<?php

namespace JSCustom\ImageResize\Facades;

use Illuminate\Support\Facades\Facade;

class ImageResize extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-image-resize';
    }
}
?>