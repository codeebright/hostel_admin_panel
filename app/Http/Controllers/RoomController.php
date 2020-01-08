<?php
namespace App\Http\Controllers;
use App\Room;
use App\Hostel;
use Illuminate\Http\Request;
use Session;
use App\Notifications;

class RoomController extends Controller
{
    public function index()
    {}
    public function create()
    {
            // show the room config page
            return view('cms.hostel.room_create');
    }
    public function store(Request $request)
    {
        // store the room details ... cms
        $request['hostel_id'] = $request->session()->get('hostel_id');
        $room = new Room();
        //$request['owner_id']  = 1; //Auth::user()->id;
        $room->owner_id = 1;
        $room->hostel_id= $request->session()->get('hostel_id');
        $room->room_number = $request->room_number;
        $room->room_rent = $request->room_rent;
        $room->area = $request->area;
        $room->total_bed = $request->total_bed;
        $room->empty_bed = $request->empty_bed;
        $room->food_service = $request->food_service;
        $room->room_description= $request->room_description;
        $room->save();
        //image uploading
        foreach ($request->file('file') as $file)
        {
            $isUploaded = uploadAttachments(session('hostel_id'),$room->id,0,$file,'attachments');
            if(!$isUploaded)
            {
                Session()->flash('att_failed','File is note uploaded try again');
            }
        }
        return redirect()->route('hostel.index');
    }
    public function show(Room $room){}
    public function edit($id)
    {
        // edit the room
        if ($id){
            $rooms = Room::find($id);
            // if the object is exist
            if ($rooms){
                return view('cms/hostel/room_edit', compact('rooms'))->with('success', 'اتاق را واریش کرده میتوانید');
            }
        }
    }
    public function update(Request $request, $id)

    {
        $input = [
            'room_number' => request()->input('room_number'),
            'area' => request()->input('area'),
            'room_rent' => request()->input('room_rent'),
            'total_bed' => request()->input('total_bed'),
            'empty_bed' => request()->input('empty_bed'),
            'room_description' => request()->input('room_description'),
            'food_service' => request()->input('food_service'),
        ];
        $rooms = Room::find($id);
        $rooms->update($input);
        return redirect()->route('hostel.index');
    }

    public function delete($id)
    {
        // delet the rooms ... ramazan
        if ($id && ctype_digit($id)){
            $rooms = Room::find($id);
            // if the object is exist
            if ($rooms && $rooms instanceof Room){
                $rooms->delete();
                return redirect()->back()->with('success', 'اتاق حذف گردید.');
            }
        }
    }
}
