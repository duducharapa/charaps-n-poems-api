<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stanza extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'poem_id'
    ];

    public function verses(): HasMany
    {
        return $this->hasMany(Verse::class);
    }
    
}
