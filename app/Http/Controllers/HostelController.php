<?php

namespace App\Http\Controllers;

use App\Hostel;
use App\HostelDetails;
use App\Address;
use App\Facility;
use App\Attachment;
use App\Owner;
use App\Room;
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
        // get hostel address and facility and send to blade 'ramazan'
        $hostels = Hostel::with('address' , 'facility')->get();
        $Rooms = Room::all();
        $owners = Owner::all();
        return view('cms.hostel.hostel_index', compact('hostels' , 'Rooms' , 'owners'));
    }
    public function hostels_list()
    {
        // get hostel address and facility and send to blade 'ramazan'
        $hostels = Hostel::with('address' , 'facility')->get();
        $Rooms = Room::all();
        $owners = Owner::all();
        return view('cms.hostel.hostels_list', compact('hostels' , 'Rooms' , 'owners'));
    }




    /**
     * Show the form for creating a new Hostel CMS.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.hostel.hostel_create')->with($panel_title = 'ایجاد لیلیه جدید');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)


    {
        // if($request->hasfile('photos'))
        //  {
        //     foreach($request->file('photos') as $photo)
        //     {
        //         $name = $photo->getClientOriginalName();
        //         $photo->move(public_path().'/images/', $name);
        //         $data[] = $name;
        //     }
        //  }

//         if ($request->hasFile('photos')) {
//             $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx','PNG'];
//             $files = $request->file('photos');
//
//             foreach ($files as $file) {
//                 $filename = $file->getClientOriginalName();
//                 $extension = $file->getClientOriginalExtension();
//                 $check = in_array($extension, $allowedfileExtension);
// // dd($check);
//                 if ($check) {
//                     $hostel = Hostel::create($request->all());
//                     dd($hostel);
//                     foreach ($request->photos as $photo) {
//                         $filename = $photo->store('photos');
//                         Attachment::create([
//                             'hostel_id' => $hostel->id,
//                             'filename' => $filename
//                         ]);
//                     }
//                     echo "Upload Successfully";
//                 } else {
//                     echo '<div class="alert alert-warning"><strong>Warning!</strong> دتنها عکس بارگذاری میشود</div>';
//                 }
//
//             }
//         }


        $hostel = new Hostel();
        $hostel->name = $request->name;
        $hostel->owner_id = 1; //Aut::user()->id;
        $hostel->type = $request->type;
        $hostel->phone = $request->phone;
        $hostel->email = $request->email;
        $hostel->description = $request->description;

        if ($request->hasFile('photos'))
        {
            $file = $request->file('photos');
            $extension = $file->getClientOriginalName();
            $file_name = time(). '.' . $extension;
            $file->move('images',$file_name);
            $hostel->photos[] = $file_name;

        }
         else
        {
            return  $request;
            $hostel->phones = '';
        }
        $hostel->save();
        $address = new Address();
        $address->hostel_id = $hostel->id;
        $address->province = $request->province;
        $address->state = $request->state;
        $address->rood = $request->rood;
        $address->alley = $request->alley;
        $address->station = $request->station;
        $address->home_number = $request->home_number;
        $address->save();

//        foreach ($request->facility_name as  $name) {
//               // code...
//               $facility = new Facility;
//               $facility->hostel_id = $hostel->id;
//               $facility->facility_name = $name;
//               $facility->save();
//             }

//        $image = $request->file('file');
//        $imageName = $image->getClientOriginalName();
//        $image->move(public_path('images'),$imageName);
//
//        $attachments = new Attachment();
//        $attachments->filename = $imageName;
//        $attachments->save();
//        return response()->json(['success'=>$imageName]);


        //     return back()->with('success','Data is stored successfully');
        //
        //     if ($image = $request->file('photos')) {
        //         foreach ($photos as $photo) {
        //         $destinationPath = 'public/images/'; // upload path
        //         $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        //         $files->move($destinationPath, $profileImage);
        //         $insert[]['photo'] = "$profileImage";
        //         }
        //     }
        //
        //     $check = Attachment::insert($insert)
        //     return Redirect::to("image")->withSuccess('Great! Image has been successfully uploaded.');
        //
        // }


        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\hostels $hostels
         * @return \Illuminate\Http\Response
         */
    }
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
    public function edit($id)
    {
        // make edit hostel ... 'ramazan'
        if ($id && ctype_digit($id)){
            $hostel = Hostel::find($id);
            // if the object is
            if ($hostel && $hostel instanceof Hostel){

                return view('cms/hostel/hostel_create', compact('hostel'));
            }
        }

    }
//$hostels = Hostel::with('address')->get();
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hostels  $hostels
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        // make update hostel details 'ramazan'

        $input = [
            'name' => request()->input('name'),
            'type' => request()->input('type'),
            'phone' => request()->input('phone'),
            'email' => request()->input('email'),
            'description' => request()->input('description'),
        ];

        $hostel = Hostel::find($id);
        $hostel->update($input);

        // make update the hostel address ... 'ramazan'
        $address = Address::find($id);
        $address->province = $request->get('province');
        $address->state = $request->get('state');
        $address->rood = $request->get('rood');
        $address->alley= $request->get('alley');
        $address->station= $request->get('station');
        $address->home_number= $request->get('home_number');
        $address->save();

        foreach ($request->facility_name as  $name) {
            $facility = new Facility;
            $facility->facility_name = $name;
            $facility->save();
        }

        return redirect()->route('hostel.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hostels  $hostels
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // delet the hostel ... ramazan
        if ($id && ctype_digit($id)){
            $hostel = Hostel::find($id);
            // if the object is exist
            if ($hostel && $hostel instanceof Hostel){
                $hostel->delete();
                return redirect()->back()->with('success', 'لیلیه حذف گردید.');
            }
        }
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
