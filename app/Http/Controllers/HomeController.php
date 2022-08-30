<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

 public function get_api()
 {
     $response = Http::get('https://arabesports.com/api/tournaments-data?token=W137nhGepjJl7j6JPkdLjY2RVqiXa7q3');
     $tests=$response->object();

//     $client = new  \GuzzleHttp\Client();
//     $response = $client->get('https://arabesports.com/api/tournaments-data?token=W137nhGepjJl7j6JPkdLjY2RVqiXa7q3');
//     $tests = json_decode($response->getBody(), true);

//    dd( $tests);
   return view('esports_api.user_interface_api',compact('tests'));
 }
}
