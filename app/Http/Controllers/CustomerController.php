<?php
namespace App\Http\Controllers;
use App\Customer;
use App\Notifications\RoomRequest;
use Illuminate\Http\Request;
use App\Notifications\Like;
use App\Room;
 use \Illuminate\Notifications\Notifiable;
class CustomerController extends Controller
{
    public function index()
    {}
    public function create()
    {}
//  $customer = Customer::find($request->id)->notify(new Like($client));
    public function store(Request $request , $room_id)
     {

       $room = Room::find($room_id);

        $customer = Customer::create([
          'phone'     => $request->phone,
          'room_id'   => $request->room_id,
          'hostel_id' => $request->hostel_id
        ]);
  //    $customer->rooms()->attach($room_id);
        if($customer){
          $customer->notify(new Like($customer));
        }
        return back();
    }

    public function notifications()
     {

       dd(showNotification());
         //$user = Customer::find(91);
         // foreach ($user->unreadNotifications as $notification) {
         //     echo $notification->type;
         // }
     }
}
