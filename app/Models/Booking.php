<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public $fillable = ['room_id','start','end','full_name','email','phone'];

    public function room(){
        return $this->belongsTo(Rooms::class,'room_id');
    }

}
