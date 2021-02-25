<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

        /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
    'title',
    'ingredients',
    'image',
    'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
