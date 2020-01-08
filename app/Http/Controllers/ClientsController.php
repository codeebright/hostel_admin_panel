<?php

namespace App\Http\Controllers;

use App\Client;
use App\Notification\Like;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('front.roomDetail_index',compact('clients'));
    }

    public function create()
    {
        return view('front.roomDetail_index');
    }

    public function store(Request $request ,$room_id)
    {
        //validation
        dd($request);
        $client = new Client;
        $client->client_phone = $request->client_phone;
        $client->save();
      //  $client = Client::find($request->id)->notify(new Like($client));
        return back();
    }
}
