<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class AboutManagementController extends Controller
{
    public function index()
    {
        $abouts = About::paginate(10);
        return view('admin/about/listAll',compact('abouts'));
    }

    public function create()
    {
        $abouts= About::paginate(10);

        return view('admin/about/create', compact('abouts'));
    }

    public function store(Request $request)
    {
        $resours= new About();
        $resours->name = $request->name;
        $resours->description = $request->description;

        $resours->save();
        if ($resours){
            return redirect('about-management')->with('success',__('Category created'));
        }
    }

    public function edit($id)
    {
        $resours = About::find($id);
        return view('admin/about/edit',compact('resours'));
    }

    public function update(Request $request , $id)
    {
        $resours = About::where(['id'=>$id]);


        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        $resours->update($data);
        return redirect('about-management')->with('success', __('Success'));
    }



    public function destroy($id)
    {
        $data = About::where('id', $id)->delete();
        return response()->json(['data' => $data, 'success' => true, 'message' => __(" deleted")], 200);
    }
}
