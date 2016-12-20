<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'band_id',
        'recorded_date',
        'release_date',
        'number_of_tracks',
        'label',
        'producer',
        'genre'
    ];

    /**
     * Set the albums recorded date to null if none is given
     *
     * @param  string  $value
     * @return void
     */
    public function setRecordedDateAttribute($value)
    {
        $this->attributes['recorded_date'] = empty($value) ? null : $value;
    }

    /**
     * Set the albums release date to null if none is given
     *
     * @param  string  $value
     * @return void
     */
    public function setReleaseDateAttribute($value)
    {
        $this->attributes['release_date'] = empty($value) ? null : $value;
    }

    /**
     * Set the albums number of tracks to null if none is given
     *
     * @param  string  $value
     * @return void
     */
    public function setNumberOfTracksAttribute($value)
    {
        $this->attributes['number_of_tracks'] = empty($value) ? null : $value;
    }

    /**
     * Get band that this ablum belongs to.
     */
    public function band()
    {
        return $this->belongsTo('App\Band');
    }
}
