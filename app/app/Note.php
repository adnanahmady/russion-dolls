<?php

namespace App;

use App\Custom\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use Cachable;

    protected $touches = ['card'];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
