<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hotels;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Support\Facades\Validator;
use Mapper;
use App\Models\HotelImage;
class HotelsManagementController extends Controller
{
    public function index()
    {
        $hotels = Hotels::paginate(10);

        return view('admin/hotels/listAll',compact('hotels'));
    }

    public function create()
    {
        $hotels= Hotels::paginate(10);
        return view('admin/hotels/create', compact('hotels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'images' => 'required',
        ]);
        try{
            $images = $request->file('images');
            $hotel = new Hotels();
            $hotel->name = $request->name;
            $hotel->description = $request->description;
            $hotel->street_number = $request->street_number;
            $hotel->address = $request->place;
            $hotel->city = $request->city;
            $hotel->country = $request->country;
            $hotel->latitude = $request->latitude;
            $hotel->longitude = $request->longitude;
            $hotel->save();

            if (!empty($images)){
                foreach ($images as $key =>$image) {
                    $new_image_name = rand() . '.' . $image->getClientOriginalExtension();
                    $path='/assets/img/hotels/'.$new_image_name;
                    $image->move(public_path('/assets/img/hotels/'), $new_image_name);
                    $hotel->images()->create(['path' => $path]);

                }
            }
            return redirect('hotels-management')->with('success',__('Hotel is created'));

//            if ($hotel){
//            }
        }catch (\Exception $exception){
//            dd($exception->getMessage());
            return redirect()->back()->with('error','Something went wrong');
        }


    }

    public function edit($id)
    {
        $hotel = Hotels::find($id);
        $hotel_images=HotelImage::where(['hotel_id'=>$id])->get();
//        dd($hotel_images);
        $allCategories = Hotels::paginate(10);
        return view('admin/hotels/edit',compact('hotel','hotel_images','allCategories'));
    }

    public function update(Request $request ,$id)
    {
        $images = $request->file('images');
//        dd($images);
        $img = new Hotels();
        $hotel =  Hotels::where(['id'=>$id]);
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'address' =>$request->place,
            'street_number' =>$request->street_number,
             "city" => $request->city,
            "country" => $request->country,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
        ];
          $hotel->update($data);

        if (!empty($images)){
            foreach ($images as $key =>$image) {
                $new_image_name = rand() . '.' . $image->getClientOriginalExtension();
                $path='/assets/img/hotels/'.$new_image_name;
                $image->move(public_path('/assets/img/hotels/') , $new_image_name);
                $img->images()->insert(['path' => $path,'hotel_id' => $id]);
            }
        }


        return redirect('hotels-management')->with('success', __('Success'));
    }



    public function destroy($id)
    {
        $data = Hotels::where('id', $id)->delete();
        return response()->json(['data' => $data, 'success' => true, 'message' => __("Hotel deleted")], 200);
    }
    public function destroy_image($id)
    {
        $data = HotelImage::where('id', $id)->delete();
        return response()->json(['data' => $data, 'success' => true, 'message' => __("Image deleted")], 200);
    }
}
