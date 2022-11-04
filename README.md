
# Laravel User Management API
Laravel package for user management. Includes user, user profile and user role.

## Table of Contents

[Getting Started](#getting-started)<br>
[Installation](#installation)<br>
[How to Use](#how-to-use)<br>
[Download Postman API](#download-postman-api)<br>
[Image Resize](#image-resize)<br>
[Sample Image Resize API](#sample-image-resize-api)<br>
[How To Implement Image Resize Helper](#how-to-implement-image-resize-helper)<br>
[Support](#support)

<a name="getting-started"></a>
## Getting Started
Below are the steps in order to integrate image resize API to your Laravel project.

<a name="installation"></a>
## Installation
Install the package using composer:

```bash
composer require jscustom/laravel-image-resize
```

Export the configuration file:

```bash
php artisan vendor:publish --provider="JSCustom\ImageResize\Providers\ImageResizeServiceProvider" --tag="config"
```

<a name="how-to-use"></a>
## How To Use

<a name="download-postman-api"></a>
### Download Postman API

Download the Postman API Collection [here](https://minhaskamal.github.io/DownGit/#/home?url=https://github.com/JSCustom/laravel-user-management/blob/master/src/assets/postman/Laravel_User_Management.postman_collection.json).

<a name="image-resize"></a>
### Image Resize

**Features**

- Resize
- Crop
- Change Quality

**Helper**

```bash
\JSCustom\ImageResize\Helpers\ImageResize
```

<a name="sample-image-resize-api"></a>
## Sample Image Resize API

**Controller**

```bash
\JSCustom\ImageResize\Http\Controllers\ImageResize\ImageResizeController
```

**URL**

```bash
{{url}}/api/image-resize
```

**Form Data**

```bash
{
  "image": `FILE`,
  "width": 150,
  "height": 150,
  "quality": 75,
  "option": "crop"
}
```

**Method**

```bash
POST
```

**Headers**

```bash
{
  "Content-Type": "multipart/form-data"
}
```

**Response**

```bash
{
    "status": true,
    "code": 201,
    "message": "Image has been created. Please see PUBLIC\\PATH\\OF\\RESIZED\\IMAGE\\2141667567259_DSC05028-Edit_FB.jpg",
    "payload": {
        "image": "PUBLIC\\PATH\\OF\\RESIZED\\IMAGE\\2141667567259_DSC05028-Edit_FB.jpg"
    }
}
```

<a name="how-to-implement-image-resize-helper"></a>
## How To Implement Image Resize Helper

**Add the helper to your controller**

```bash
use JSCustom\ImageResize\Helpers\ImageResize;
```

**In your controller, follow this code structure**

```bash
$image = ImageResize::imageResize($request);
```

**Or initiate in the construct of your controller**

```bash
public function __construct(
    \JSCustom\ImageResize\Services\ImageResizeService $ImageResizeService
) {
    $this->_imageResizeService = $ImageResizeService;
}
```

**Then follow this code structure**

```bash
$image = $this->_imageResizeService->imageResize($request);
```

<a name="support"></a>
### Support
For support, email developer.jeddsaliba@gmail.com."# laravel-image-resize" 
