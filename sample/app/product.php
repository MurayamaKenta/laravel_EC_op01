<?php

namespace App;

use App\User;
use App\category;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
