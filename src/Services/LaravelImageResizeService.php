<?php

namespace JSCustom\LaravelImageResize\Services;

use JSCustom\LaravelImageResize\Providers\HttpServiceProvider;
use JSCustom\LaravelImageResize\Helpers\ImageResize;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use Exception;

class LaravelImageResizeService
{
    public function imageResize($request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            try {
                $width = $request->width ?? config('image-resize.width');
                $height = $request->height ?? config('image-resize.height');
                $quality = $request->quality ?? config('image-resize.quality');
                $option = 'auto';
                $options = new Collection(config('image-resize.options'));
                if ($options->contains($request->option)) {
                    $option = $request->option;
                }
                $image = new ImageResize($_FILES['image'], true);
                $image->resizeImage($width, $height, $option);
                $newImageName = rand(111, 999) . time() . '_' . $request->file('image')->getClientOriginalName();
                File::ensureDirectoryExists(public_path(config('image-resize.save_folder')));
                $image->saveImage(public_path(config('image-resize.save_folder') .'/'. $newImageName), $quality);
                return (object) [
                    'code' => HttpServiceProvider::CREATED,
                    'message' => HttpServiceProvider::CREATED_MESSAGE . ' Please see ' . public_path(config('image-resize.save_folder') .'/'. $newImageName),
                    'status' => true,
                    'image' => public_path(config('image-resize.save_folder') .'/'. $newImageName)
                ];
            } catch (Exception $e) {
                return (object) [
                    'code' => HttpServiceProvider::BAD_REQUEST,
                    'message' => $e->getMessage(),
                    'status' => false,
                    'image' => null
                ];
            }
        } else {
            return (object) [
                'code' => HttpServiceProvider::BAD_REQUEST,
                'message' => HttpServiceProvider::BAD_REQUEST_MESSAGE,
                'status' => false,
                'image' => null
            ];
        }
    }
}
?>