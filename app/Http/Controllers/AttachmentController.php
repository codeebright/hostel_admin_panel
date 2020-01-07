<?php

namespace App\Http\Controllers;
use App\Attachment;
use App\HostelDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\input;

class AttachmentController extends Controller
{

//store photo from dropdown ... ramazan
    public function addphotos(Request $request)
    {

        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);

        // $hostel = new Hostel;


        $imageUpload = new Attachment;
        // $imageUpload->hostel_id = $hostel->id;

        $imageUpload->file_name = $imageName;

        $imageUpload->hostel_id = $request->session()->pull('hostel_id');
        // $imageUpload->room_id   = $request->get('room_id');
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);




    }

    //deleting photos from table ... ramazan
    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('file_name');
        Attachment::where('file_name',$filename)->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
}
