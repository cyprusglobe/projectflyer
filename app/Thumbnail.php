<?php

namespace App;

use Intervention\Image\Facades\Image;

class Thumbnail
{
    public function make($src, $destination)
    {
        Image::make($src)
            ->fit(200)
            ->save($destination);
    }
}
