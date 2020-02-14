<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
