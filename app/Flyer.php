<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    /**
     * Fillable fields for a flyer.
     *
     * @var array
     */
    protected $fillable = [
        'street',
        'city',
        'state',
        'country',
        'zip',
        'price',
        'description',
    ];

    /**
     * Find the flyer at the given address.
     *
     * @param $zip
     * @param $street
     * @return mixed
     */
    public static function locatedAt($zip, $street)
    {
        $street = str_replace('-', ' ', $street);

        return static::where(compact('zip', 'strret'))->first();
    }

    /**
     * Attribute to format a give price.
     *
     * @param $price
     * @return string
     */
    public function getPriceAttribute($price)
    {
        return '$'.number_format($price);
    }


    /**
     * Add Photo to the referenced flyer.
     *
     * @param Photo $photo
     * @return Model
     */
    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    /**
     * A flyer is composed of many photos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
