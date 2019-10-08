<?php

namespace App\Http\Controllers;

use App\Hostel;
use App\HostelDetails;
use App\Address;
use App\Facility;
use Illuminate\Http\Request;
use App\Http\Requests\HostelRequest;
use App\Http\Requests\ownerRequest;
class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.hostel.hostel_index');
    }

    /**
     * Show the form for creating a new Hostel CMS.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.hostel.hostel_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $hostel = new Hostel;
        $hostel->name = $request->name;
        $hostel->owner_id = 1; //Aut::user()->id;
        $hostel->type = $request->type;
        $hostel->phone = $request->phone;
        $hostel->email = $request->email;
        $hostel->descrption = $request->descrption;
        $hostel->save();

        $address = new Address();
        $address ->hostel_id = $hostel->id;
        $address->province = $request->province;
        $address->state = $request->state;
        $address->rood = $request->rood;
        $address->alley = $request->alley;
        $address->station = $request->station;
        $address->home_number = $request->home_number;
        $address->save();

        foreach ($request->facility_name as  $name) {
               // code...
               $facility = new Facility;
               $facility->hostel_id = $hostel->id;
               $facility->facility_name = $name;
               $facility->save();
             }




        return back()->with('success','Data is stored successfully');


    }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\hostels  $hostels
         * @return \Illuminate\Http\Response
         */

    public function show(hostels $hostels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hostels  $hostels
     * @return \Illuminate\Http\Response
     */
    public function edit(hostels $hostels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hostels  $hostels
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hostels $hostels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hostels  $hostels
     * @return \Illuminate\Http\Response
     */
    public function destroy(hostels $hostels)
    {
        //
    }

    /*
     * List Hostel front
     * */

    public function listHostel()
    {
        $hostels = Hostel::all();
        return view('front/khabgha_list',['hostels' => $hostels]);
    }

}
