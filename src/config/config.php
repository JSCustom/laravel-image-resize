<?php
return [
    'prefix' => 'api',
    'width' => 100,
    'height' => 100,
    'quality' => 75,
    'options' => [
        'auto',
        'crop',
        'exact',
        'portrait',
        'landscape'
    ],
    'save_folder' => 'temp',
    'middleware' => ['api']
];
?>