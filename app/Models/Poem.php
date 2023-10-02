<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function stanzas(): HasMany
    {
        return $this->hasMany(Stanza::class);
    }

}
