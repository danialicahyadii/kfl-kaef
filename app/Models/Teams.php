<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teamPoints()
    {
        return $this->hasOne(Points::class, 'team_id');
    }


}
