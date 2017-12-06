<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function user_visits ()
    {
        return $this->hasMany(UserVisit::class, 'link_id', 'id');
    }
}
