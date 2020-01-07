<?php
namespace App\Http\Controllers;
use App\Hostel;

use App\Address;
use App\Facility;
use App\Attachment;
use App\User;
use App\Room;
use Session;
use Illuminate\Http\Request;
use DB;
class HostelController extends Controller
{
    public function index(Request $request)
    {
        $hostel_id = Session::get('hostel_id');
        $hostel = Hostel::with('address' , 'facility')->findOrFail(Session::get('hostel_id'));
        $Rooms = Room::all();
        $Users = User::all();
        return view('cms.hostel.hostel_index', compact('hostel' , 'Rooms' , 'Users'));
    }

    public function hostels_list()
    {
        // get hostel address and facility and send to blade 'ramazan'
        $hostels = Hostel::with('User')->get();
        return view('cms.hostel.hostels_list', compact('hostels'));
    }





    public function create(  )
    {
        $facility = Facility::all();
        return view('cms.hostel.hostel_create' , compact('facility'))->with($panel_title = 'ایجاد لیلیه جدید');
    }

    public function store(Request $request)
    {

        $hostel = Hostel::create(
            [

                'name' => $request->name,
                'type' => $request->type,
                'phone' => $request->phone,
                'email' => $request->email,
            ]
        );

        $facility = $request->input('facility_name');
        $hostel->facility()->attach($facility);


        $address = new Address();

        $address->hostel_id = $hostel->id;
        $address->province = $request->province;
        $address->state = $request->state;
        $address->rood = $request->rood;
        $address->alley = $request->alley;
        $address->station = $request->station;
        $address->home_number = $request->home_number;
        $address->save();

        foreach ($request->file('file') as $file)
        {
            $isUploaded = uploadAttachments($hostel->id,0,0,$file,'attachments');
            if(!$isUploaded)
                Session()->flash('att_failed','File is note uploaded try again');
        }

        return redirect()->route('hostels_list');
    }


    public function show($hostel_id=0 )
    {
        if(Session::has('hostel_id') && $hostel_id == 0)
        {
            $hostel_id = Session::get('hostel_id');
            //  dd($hostel_id);
        }
        else
        {
            Session::put('hostel_id',$hostel_id);
        }
        $hostel = Hostel::with('User')->findOrFail($hostel_id);
        $hostel_attachments = Attachment::where('hostel_id',$hostel->id)->where('room_id',0)->get();
        return view('cms.hostel.hostel_index', compact('hostel' , 'hostel_attachments' , 'Users'));
    }

    public function edit($id)
    {
        // make edit hostel ... 'ramazan'
        if ($id && ctype_digit($id)){
            $hostel = Hostel::find($id);
            // if the object is
            if ($hostel && $hostel instanceof Hostel){
                $facility = Facility::all();
                $hostel_facility = $hostel->facility()->get()->pluck('id')->toArray();
                return view('cms/hostel/hostel_edit', compact('hostel' , 'hostel_facility' ,'facility'));
            }
        }

    }
//$hostels = Hostel::with('address')->get();

    public function update(Request $request , $id )
    {
        $hostel = Hostel::find($id);
        // Update Hostel
        $hostel->update($request->all());
        // Update Address of Hostel
        $address = Address::updateOrCreate(['hostel_id' => $id],$request->all());
        $facility = $request->facility_name;
        $hostel->facility()->sync($facility);
        $hostel_attachments = Attachment::where('hostel_id',$id)->where('room_id',0)->get();
        return redirect()->route('hostel.show',$id);

    }
    public function delete($id)
    {
        $hostel = Hostel::where('id',$id)->delete();
        if($hostel)
         return successMessage(trans('global.success_delete_msg'));
        else
         return errorMessage(trans('global.failed_delete_msg'));
    }
    public function listHostel()
    {
        $hostels = DB::table('hostels')
            ->join('hostel_photos','hostel_photos.id','=','hostels.id')
            ->join('addresses','addresses.id', '=' ,'hostels.id')
        ->select('hostels.*','hostel_photos.*','addresses.*')->get();
        return view('front/hostel_list',compact('hostels'));
    }

}
