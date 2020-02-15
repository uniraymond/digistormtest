<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('\App\User');
    }

    /**
     * load phone path
     */
    public function path()
    {
        return '/phone/' . $this->id;
    }

    /**
     * load phone path with id
     *
     * @return string
     */
    public function userpath($id)
    {
        return 'user/' . $id . '/info';
    }
}
