<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use \RD\Traits\Cacheable;

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
