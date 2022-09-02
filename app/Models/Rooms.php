<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    public $table = 'rooms';
    public $fillable = ['description','price','type','hotel_id',];

    public  function  images(){

        return $this->hasMany(RoomImage::class,'room_id');
    }
    public  function  bookings(){
        return $this->hasMany(Booking::class,'room_id');
    }
    public  function  hotel(){
        return $this->belongsTo(Hotels::class);
    }

    public function getImagePathAttribute(){
        return $this->images()->count() ? $this->images()->first()->path : '';
    }
}
