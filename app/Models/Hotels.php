<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    use HasFactory;

    public $table = 'hotels';
    public $fillable = ['name','description','address','city','country','latitude','longitude','street_number'];

    public  function  images(){

        return $this->hasMany(HotelImage::class,'hotel_id');
    }
    public  function  rooms(){

        return $this->hasMany(Rooms::class,'hotel_id');
    }

    public function getImagePathAttribute(){
        return $this->images()->count() ? $this->images()->first()->path : '';
    }


    public function getRoomsMinPriceAttribute(){
        if ($this->rooms()->count()){

            return $this->rooms()->orderBy('price','ASC')->first()->price;
        }
        return 0;
    }
    public function getRoomsCountAttribute()
    {
        if ($this->rooms()->count()) {
            return $this->rooms()->orderBy('type', 'ASC')->count();

//           return $this->rooms()->groupBy('type')->pluck('type',\DB::raw('COUNT(type)'))->toArray();
        }
        return 0;
    }
        public function getRoomsTypeCountAttribute(){
        if ($this->rooms()->count()){

           return $this->rooms()->groupBy('type')->pluck('type',\DB::raw('COUNT(type)'))->toArray();
        }
        return [];

    }
}
