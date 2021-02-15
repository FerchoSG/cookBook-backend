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

    /**
     * Get the user that owns the Recipe
     *
     * @return \Illuminat1JRpfow927XUoPtmgataMC5m5aLewzNYUP
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}