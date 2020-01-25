<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $guarded = [];

    public function product()
    {
        return $this->hasMany(product::class);
    }
}
