<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
   
protected $fillable = [
    'user_id',
    'title',
    'description',
    'ingredients',
    'instructions',
    'image',
];

public function user()
{
    return $this->belongsTo(User::class);
}
}
