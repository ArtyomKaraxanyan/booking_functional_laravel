<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class ManagementController extends Controller
{
    public function __construct(){
        if (!Auth::user()){
            return view('admin.login');
        }
    }

    public function index(){
        $restaurant = Restaurant::where(['id' => 1])->first();
        return view('admin/restaurant/edit',compact('restaurant'));
    }

    public function update(Request $request,$id){
        Restaurant::where(['id' => $id])->update($request->except(['_token','_method']));
        return redirect('restaurant-management')->with('success', __('Success'));
    }
}
