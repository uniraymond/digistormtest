<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
