<?php

namespace App\Http\Controllers;

use App\Notifications\RoomRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //



    public function index()
    {
        //

        auth()->user()->notify(new RoomRequest());
    }
}
