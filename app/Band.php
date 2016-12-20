<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'start_date',
        'website',
        'still_active'
    ];

    /**
     * Set the bands start date to null if none is given
     *
     * @param  string  $value
     * @return void
     */
    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = empty($value) ? null : $value;
    }

    /**
     * Get all of the bands albums.
     */
    public function albums()
    {
        return $this->hasMany('App\Album');
    }

    /**
     * A list of the ids for each album associated with this band
     */
    public function getAlbumListAttribute()
    {
        return $this->albums->pluck('id')->all();
    }
}
