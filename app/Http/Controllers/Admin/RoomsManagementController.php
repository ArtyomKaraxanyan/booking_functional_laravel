<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RoomTypes;
use App\Models\Hotels;
use App\Models\RoomImage;
use App\Models\Rooms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Image;



class RoomsManagementController extends Controller
{
    public function index()
    {
//        $products = Product::with('category')->paginate(10);
        $rooms = Rooms::all();
         $hotels=Hotels::all();
        return view('admin/rooms/listAll',compact('rooms','hotels'));
    }

    public function create()
    {
        $hotels = Hotels::all();
        $room_types = RoomTypes::all();
        return view('admin/rooms/create',compact('hotels','room_types'));
    }

    public function store(Request $request)
    {
        $room = new Rooms();
        $images = $request->file('images');
        $room->hotel_id = $request->hotel;
        $room->description =  $request->description;
        $room->type =  $request->type;
        $room->price = $request->price;
        $room->bad = $request->bad;
        $room->room_size = $request->room_size;
        $room->bathroom = $request->bathroom;
        $room->guest_count = $request->guest_count;
        $room->save();
        if (!empty($images)){
            foreach ($images as $key =>$image) {
                $new_image_name = rand() . '.' . $image->getClientOriginalExtension();
                $path='/assets/img/rooms/'.$new_image_name;
                $image->move(public_path('/assets/img/rooms/'), $new_image_name);
                $room->images()->create(['path' => $path]);

            }
        }

        if ($room){
            return redirect('rooms-management')->with('success',__('Room created'));
        }
    }

    public function edit($id)
    {
        $hotels = Hotels::all();
        $room = Rooms::where(['id' => $id])->first();
       $this_hotel = Hotels::where(['id' => $room->hotel_id])->first();
//        $this_hotel = Hotels::find($id);
        $room_images=RoomImage::where(['room_id'=>$id])->get();
        $room_types = RoomTypes::all();
        return view('admin/rooms/edit',compact('hotels', 'room_images','this_hotel','room','room_types'));
    }


    public function update(Request $request , $id)
    {

        $images = $request->file('images');
        $room = Rooms::where(['id' => $id]);
        $img = new Rooms();
        $data = [
            'hotel_id' => $request->hotel,
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
            'bad' => $request->bad,
            'room_size' => $request->room_size,
            'bathroom' => $request->bathroom,
            'guest_count' => $request->guest_count,

        ];
        $room->update($data);
        if (!empty($images)){
            foreach ($images as $key =>$image) {
                $new_image_name = rand() . '.' . $image->getClientOriginalExtension();
                $path='/assets/img/rooms/'.$new_image_name;
                $image->move(public_path('/assets/img/rooms/'), $new_image_name);
                $img->images()->insert(['path' => $path,'room_id' => $id]);


            }
        }
        return redirect('rooms-management')->with('success', __('Success'));
    }



    public function destroy($id)
    {
        $data = Rooms::where('id', $id)->delete();
        return response()->json(['data' => $data, 'success' => true, 'message' => __("Product deleted")], 200);
    }
    public function destroy_image($id)
    {
        $data = RoomImage::where('id', $id)->delete();
        return response()->json(['data' => $data, 'success' => true, 'message' => __("Product deleted")], 200);
    }
}
