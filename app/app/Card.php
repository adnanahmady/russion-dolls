<?php

namespace App;

use App\Custom\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use Cachable;

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
