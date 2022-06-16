<?php

namespace App\Http\Controllers;

use App\Enums\RoomTypes;
use App\Models\Booking;
use App\Models\HotelImage;
use App\Models\RoomImage;
use App\Models\Rooms;
use Illuminate\Http\Request;
use App\Models\Hotels;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Mail;
class HotelPageController extends Controller
{
    public function index(Request $request)
    {

        if   ($request->ajax()) {
            $city = $request->city;
            $start = $request->start_date;
            $end = $request->end_date;
            $type = $request->room_type;

            if ($request->location==null){
                $city=null;
            }
            $hotels = Hotels::query();
            if ($city){
                $hotels = $hotels->where(['city' => $city]);
            }
            if ($start || $end) {
                $hotels = $hotels->whereHas('rooms', function ($q) use ($start, $end) {
                    $q->doesntHave('bookings')->orWhereHas('bookings', function ($q) use ($start, $end) {
                        if ($start && $end) {
                            $q->whereNotBetween('start', [$start, $end])->whereNotBetween('end', [$start, $end])->whereRaw('? not between start and end', [$start])->whereRaw('? not between start and end', [$end]);
                        } elseif ($start && !$end) {
                            $q->whereRaw('? not between start and end', [$start]);
                        } elseif (!$start && $end) {
                            $q->whereRaw('? not between start and end', [$end]);
                        }

                    });

                });
            }
            if($type){
                $hotels = $hotels->whereHas('rooms', function ($q) use ($type) {
                    $q->where(['type' => $type]);
                });
            }

            $hotels = $hotels->get();
            $view_data['get_hotels'] = $hotels;
            $view_data['address'] = $city;
            $view_data['hotels'] = view('partials.hotel_search', compact('hotels'))->render();

            return $view_data;
        }

        $hotels = Hotels::orderBy('name')->get();
//        $room_type_count = Hotels::whereHas('rooms')->get();
        $room_types=RoomTypes::all();
        return view('welcome', compact('hotels','room_types'));
    }

    public function hotel( Request $request, $id)
    {

        if  ($request->ajax()) {
            $type=$request->type;
            $hotel = Hotels::find($id)->get();
            $rooms=Rooms::where(['hotel_id'=>$id,'type'=>$type])->get();
            $count= $rooms->count();
            $view_data['hotel_rooms'] = view('partials.rooms', compact('hotel','rooms','count','type'))->render();
            return $view_data;
        }

        $hotel = Hotels::find($id);
        $hotels = Hotels::orderBy('name')->get();
        $rooms= $hotel->rooms;
        $room_types=RoomTypes::all();
        $hotel_images=HotelImage::where('hotel_id',$id)->get();
        return view('hotel', compact('hotel','hotels','room_types','rooms','hotel_images'));
    }

    public function check_availability(Request $request, $id){

//        dd($request->all());
        $adult= $request->adult;
        $start = $request->start_date;
        $end = $request->end_date;
        $children = $request->children;
        $totoal_guests=$adult+$children;

        $rooms = Rooms::query();
        $rooms = $rooms->where('hotel_id' , $id);
        if ($adult || $children){
            $rooms = $rooms->where('guest_count', '>=', $totoal_guests);
        }
//        dd($rooms);

        if ($start || $end) {
            $rooms = $rooms->whereHas('bookings',function ($q) use ($start, $end) {
                    if ($start && $end) {
                        $q->whereNotBetween('start', [$start, $end])->whereNotBetween('end', [$start, $end])->whereRaw('? not between start and end', [$start])->whereRaw('? not between start and end', [$end]);
                    } elseif ($start && !$end) {
                        $q->whereRaw('? not between start and end', [$start]);
                    } elseif (!$start && $end) {
                        $q->whereRaw('? not between start and end', [$end]);
                    }
            });
        }
        $rooms=$rooms->get();
        $hotel = Hotels::find($id)->get();
        $count= $rooms->count();
        $view_data['hotel_rooms'] = view('partials.availability_rooms', compact('hotel','rooms','count'))->render();
        return $view_data;

    }



    public function booking_room( Request $request, $id)
    {
        if   ($request->ajax()) {
            \DB::table('bookings')->insert([
                'room_id' => $id,
                'start' => $request->input('start'),
                'end' => $request->input('end'),
                'full_name' => 'Some Name',
                'email' => 'Some Email',
                'phone' => 'Some Phone',
            ]);
            return response()->json(['success'=>'Success booking']);
        }

        $room=Rooms::find($id);
        $hotel = Hotels::where(['id' => $room->hotel_id])->first();
        $hotels = Hotels::orderBy('name')->get();
        $rooms= $hotel->rooms;
        $room_types=RoomTypes::all();
        $room_images=RoomImage::where('room_id',$id)->get();
        $busy_days=Booking::where('room_id',$id)->get();
        return view('booking_room', compact('hotel','hotels','room_types','rooms','room','room_images','busy_days'));

    }
    public function rooms(Request $request){

        if   ($request->ajax()) {

            if($request->hotel_id){
                    $hotel_id= $request->hotel_id;
                    $hotel =Hotels::where('id',$hotel_id)->first();
                    $all_hotels=Hotels::all();
                     $view_data['get_hotels'] = $all_hotels;
                    $view_data['address']=$hotel->city;
                    $view_data['hotel_rooms'] = view('partials.rooms_search_from_hotel', compact('hotel','all_hotels'))->render();
                    return $view_data;


            }else{
            $city = $request->city;
            $start = $request->start_date;
            $end = $request->end_date;
            $type = $request->room_type;

            if ($request->location==null){
                $city=null;
            }
            $hotels = Hotels::query();
            if ($city){
                $hotels = $hotels->where(['city' => $city]);
            }
            if ($start || $end) {
                $hotels = $hotels->whereHas('rooms', function ($q) use ($start, $end) {
                    $q->doesntHave('bookings')->orWhereHas('bookings', function ($q) use ($start, $end) {
                        if ($start && $end) {
                            $q->whereNotBetween('start', [$start, $end])->whereNotBetween('end', [$start, $end])->whereRaw('? not between start and end', [$start])->whereRaw('? not between start and end', [$end]);
                        } elseif ($start && !$end) {
                            $q->whereRaw('? not between start and end', [$start]);
                        } elseif (!$start && $end) {
                            $q->whereRaw('? not between start and end', [$end]);
                        }

                    });

                });
            }
            if($type){
                $hotels = $hotels->whereHas('rooms', function ($q) use ($type) {
                    $q->where(['type' => $type]);
                });
            }
            $hotels = $hotels->get();
            $view_data['get_hotels'] = $hotels;
            $view_data['address'] = $city;
            $view_data['rooms'] = view('partials.rooms_search', compact('hotels','type'))->render();

            return $view_data;
            }
        }


        $rooms=Rooms::all();
        $count= $rooms->count();
        $room_types=RoomTypes::all();
        $hotels = Hotels::orderBy('name')->get();
        return view('rooms',compact('rooms','count','room_types','hotels'));

    }

    public function send_email(Request $request){

        $validated = $request->validate([
            'user_email' => 'required|email|max:255',
            'message' => 'required',
        ]);
        $details = [
            'user_email' => $request->user_email,
            'message' => $request->message
        ];
        Mail::to('kaghinloft@gmail.com')->send(new \App\Mail\SendMail($details));

        return redirect('/');

    }
}
