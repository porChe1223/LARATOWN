<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'stock', 'img_link'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carted()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
