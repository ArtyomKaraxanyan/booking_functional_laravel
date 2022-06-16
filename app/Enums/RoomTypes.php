<?php
/**
 * Created by PhpStorm.
 * User: Artyom
 * Date: 28.05.2022
 * Time: 15:04
 */

namespace App\Enums;


class RoomTypes
{

    public static function all(){

        return

           [
            'Standard'=>'page_template/image/room_type_images/standard.jpg',
            'Double'=>'page_template/image/room_type_images/double.jpg',
            'Lux'=>'page_template/image/room_type_images/luxe.jpg'
            ] ;
    }


}