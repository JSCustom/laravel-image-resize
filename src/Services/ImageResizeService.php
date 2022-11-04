<?php

namespace JSCustom\LaravelImageResize\Services;

use JSCustom\LaravelImageResize\Providers\HttpServiceProvider;
use JSCustom\LaravelImageResize\Helpers\ImageResize;
use Illuminate\Support\Collection;
use Exception;

class ImageResizeService
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
                $image->saveImage(config('image-resize.save_folder') .'/'. $newImageName, $quality);
                return [
                    'code' => HttpServiceProvider::CREATED,
                    'message' => HttpServiceProvider::CREATED_MESSAGE . ' Please see ' . config('image-resize.save_folder') .'/'. $newImageName
                ];
            } catch (Exception $e) {
                return [
                    'code' => HttpServiceProvider::BAD_REQUEST,
                    'message' => $e->getMessage()
                ];
            }
        } else {
            return [
                'code' => HttpServiceProvider::BAD_REQUEST,
                'message' => HttpServiceProvider::BAD_REQUEST_MESSAGE
            ];
        }
    }
}
?>