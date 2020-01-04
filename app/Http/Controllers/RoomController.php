<?php

namespace App\Http\Controllers;

use App\Room;
use App\Hostel;
use Illuminate\Http\Request;
use Session;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //      // show the room config page
        return view('cms.hostel.room_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // store the room details ... ramazan

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
//

//        $room = Room::create($request->all());

          //check if new room was created
//        if ($room instanceof Room){
//        return redirect()->back();
////      return redirect()->route('hostel.show',Session::get('hostel_id'))->with('success' ,'Room insterted succesfully');
//        }

        //image uploading


        foreach ($request->file('file') as $file)
        {
            $isUploaded = uploadAttachments(session('hostel_id'),$room->id,0,$file,'attachments');
            if(!$isUploaded)
            {
                Session()->flash('att_failed','File is note uploaded try again');
            }

        }



        return redirect()->route('hostel.show');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if ($id){
            $rooms = Room::find($id);
            // if the object is exist
            if ($rooms && $rooms instanceof Room){
                return view('cms/hostel/room_edit', compact('rooms'))->with('success', 'اتاق را واریش کرده میتوانید');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
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
