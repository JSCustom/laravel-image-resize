<?php

namespace JSCustom\LaravelImageResize\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelImageResize extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-image-resize';
    }
}
?>