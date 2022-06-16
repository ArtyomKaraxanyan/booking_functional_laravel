<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ServiceManagementController extends Controller
{
    public function index()
    {
//        $rooms = Product::with('category')->paginate(10);
        $services = Service::paginate(10);


        return view('admin/services/listAll',compact('services'));
    }

    public function create()
    {

        return view('admin/services/create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['string', 'max:255', 'required'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',

        ]);
        $image = $request->file('image');
        $new_image_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/img/services'), $new_image_name);

        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->icon = $new_image_name;
        $service->save();
        if ($service){
            return redirect('services-management')->with('success',__('Category created'));
        }
    }

    public function edit($id)
    {
        $category = Service::find($id);


        return view('admin/services/edit',compact('category'));
    }

    public function update(Request $request , $id)
    {
        $category = Service::where(['id'=>$id]);
        $image = $request->file('image');

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if (!empty($image)){
            $new_image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img/services'), $new_image_name);
            $data['image'] = $new_image_name;
        }

        $category->update($data);



        return redirect('services-management')->with('success', __('Success'));

    }
    public function destroy($id)
    {
        $data = Service::where('id', $id)->delete();
        return response()->json(['data' => $data, 'success' => true, 'message' => __("Service deleted")], 200);
    }
}
