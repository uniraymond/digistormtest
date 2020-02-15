<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo('\App\User');
    }

    /**
     * load profile path with id
     *
     * @return string
     */
    public function path()
    {
        return '/profile/' . $this->id;
    }
}
