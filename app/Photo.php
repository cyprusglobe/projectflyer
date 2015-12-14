<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The associated table.
     * @var string
     */
    protected $table = 'flyer_photos';

    /**
     * Fillable fields for a photo.
     * @var array
     */
    protected $fillable = ['path', 'name', 'thumbnail_path'];

    /**
     * A photo belong to a flyer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }

    /**
     * Get the path to the photo's thumbnail.
     *
     * @return string
     */
    public function baseDir()
    {
        return 'images/photos';
    }

    /**
     *
     */
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;

        $this->path = $this->baseDir().'/'.$name;
        $this->thumbnail_path = $this->baseDir().'/tn-'.$name;
    }
}
