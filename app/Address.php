<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
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
     * load address path with id
     *
     * @return string
     */
    public function path()
    {
        return '/address/' . $this->id;
    }

    /**
     * load address path with id
     *
     * @return string
     */
    public function userpath($id)
    {
        return 'user/' . $id . '/info';
    }
}
