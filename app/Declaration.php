<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Declaration extends Model
{
    protected $fillable = [
        'title',
        'deadline',
    ];

    protected $dates = [
        'deadline'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo('App\User');
    }
}
