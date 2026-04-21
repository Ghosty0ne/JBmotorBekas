<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
protected $fillable = [
    'user_id',
    'title',
    'category',
    'price',
    'year',
    'engine_cc',
    'mileage',
    'description',
    'location',
    'image'
];
public function user()
{
    return $this->belongsTo(User::class);
}
public function images()
{
    return $this->hasMany(ListingImage::class);
}
public function favorites()
{
    return $this->hasMany(Favorite::class);
}
public function comments()
{
    return $this->hasMany(Comment::class)->latest();
}
public function chats()
{
    return $this->hasMany(Chat::class);
}
}
