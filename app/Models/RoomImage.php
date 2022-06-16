<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "room_images";
    public $timestamps = false;
    protected $fillable = [
        'room_id', 'path'
    ];
}
