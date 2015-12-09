<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $table = 'flyer_photos';

    protected $fillable = ['path', 'name', 'thumbnail_path'];

    protected $baseDir = 'flyers/photos';

    /**
     * A photo is owned by a flyer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }

    /**
     * Build a new photo instance from a file upload.
     * @param $name
     * @return static
     */
    public static function named($name)
    {
        $photo = new static;

         return (new static)->saveAs($name);
    }


    /**
     * @param $name
     * @return $this
     */
    public function saveAs($name)
    {
         $this->name = sprintf('%s-%s', time(), $name);
         $this->path = sprintf('%s/%s', $this->baseDir, $this->name);
         $this->thumbnail_path = sprintf('%s/tn-%s', $this->baseDir, $this->name);

        return $this;
    }

    /**
     * @param UploadedFile $file
     * @return $this
     */
    public function move(UploadedFile $file)
    {
        $file->move($this->baseDir, $this->name);

        $this->makeThumbnail();

        return $this;
    }

    /**
     *
     */
    protected function makeThumbnail()
    {
        Image::make($this->path)
            ->fit(200)
            ->save($this->thumbnail_path);
    }
}
