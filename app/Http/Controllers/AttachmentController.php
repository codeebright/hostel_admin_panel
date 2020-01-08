<?php

namespace App\Http\Controllers;
use App\Attachment;
use App\HostelDetails;
use App\Home;
use Illuminate\Http\Request;
use App\Http\Requests\AttachmentRequest;
use Illuminate\Support\Facades\input;
use Response;
use File;


class AttachmentController extends Controller
{
    // Save image
   public function save(Request $request){
       $new_file = new Attachment;
       if(Input::hasFile('image')){
         $file = Input::file('image');
         $file->move(public_path('images').'/',$file->getClientOriginalName());
         $new_file->file_name = $file->getClientOriginalName();
         $new_file->save();
         return back();
       }
   }

    public function index()
    {

      $file_details = HostelDetails::find();
      $files = Attachment::where('detail_id',$file_details->id);
      return view('front/khabgha_list',compact('files'));
    }

    public function store(Request $request)
    {
      $hDetail_id = HostelDetails::all();

      $new_file = new Attachment;
      if (Input::hasFile('image')) {
        $file = Input::file('image');
        $file->move(public_path('images').'/',$file->getClientOriginalName());
        $new_file->file_name = $file->getClientOriginalName();
        $new_file->save();
        return back()->with('success','data saved successfully');
      }
    }

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

    public function destoryAttachment(Request $request)
          {
                    $id    = decrypt($request->record_id);
                    $table = decrypt($request->table);
                    $attachment = Attachment::where('id',$id)->first();
                    $file= public_path()."/".$attachment->file_path;
                    if(File::delete($file))
              			{
                      $result = Home::deleteRecord($table,array('id' => $id));
                      if($result)
                        return successMessage(trans('global.success_delete_msg'));
                      else
                        return errorMessage(trans('global.failed_delete_msg'));
                    }
                    else
                    {
                      return errorMessage(trans('global.failed_delete_msg'));
                    }
          }

    public function store_attachments(AttachmentRequest $request)
    {
      // Getting post data
      $file = $request->file;// Get File
      $hostel_id = decrypt($request->hostel_id);
      $table     = decrypt($request->table);
      $room_id   = decrypt($request->room_id); // Record id
      $file_name = $request->file_name;
      $errors = "";
      if($request->hasFile('file'))
      {

          // Path is pmis/public/attachments/..
          $destinationPath = 'attachments/hostel/';
          $fileOrgName     = $file->getClientOriginalName();
          $fileExtention   = $file->getClientOriginalExtension();
          $fileOrgSize     = $file->getSize();
          $attachment      = Attachment::orderBy('id','desc')->first();
          $attachment_latest = ($attachment?$attachment->id + 1:1);
          if($file_name!="")
          {
            $name = $file_name;
            $file_name = $file_name."ـ".$attachment_latest.".".$fileExtention;
          }
          else
          {
            $name = explode('.', $fileOrgName)[0];
            $file_name = $fileOrgName;
          }
          deleteFile($table,$request,($request->is_edit==true?true:false));
          $upload_success = $file->move($destinationPath, $file_name);
          if($upload_success)
          {
                $data = [
                  'hostel_id'  => $hostel_id,
                  'room_id'    => $room_id,
                  'file_name'  => $file_name,
                  'file_path'  => $destinationPath."/".$file_name,
              ];

            $record = inserOrUpdatetAttachment($table,$data,$request);
            if($record)
            {
              //Get Attachments
              $request['attachments'] = getAttachments($table,$hostel_id,$room_id);
              // Load view to show result
              return view('attachments/modal_load',$request->all());
            }
            else
            {
              Session()->flash('fail', __("global.failed_att_msg"));
              return '
                <div class="m-alert m-alert--icon m-alert--outline alert alert-warning alert-dismissible fade show col-lg-12" role="alert">
                  <div class="m-alert__icon"><i class="la la-warning"></i></div>
                  <div class="m-alert__text">'.__("global.success_att_msg").'</div>
                  <div class="m-alert__close"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button></div>
                </div>
              ';
            }
          }
          else
          {
            Session()->flash('fail', __("global.failed_att_msg"));
            return '
                <div class="m-alert m-alert--icon m-alert--outline alert alert-warning alert-dismissible fade show col-lg-12" role="alert">
                  <div class="m-alert__icon"><i class="la la-warning"></i></div>
                  <div class="m-alert__text">'.__("global.success_att_msg").'</div>
                  <div class="m-alert__close"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button></div>
                </div>
              ';
          }

      }
    }


    public function DownloadAttachments($id=0,$table='')
  	{
      $id = decrypt($id);
  		//get data from database
  		$data = Attachment::find($id);
      //public path for file
      $file = $data->file_path;
      //download file
      return Response::download($file);
    }

    /**
     * Create Attachment
     */
    function createAttachment(Request $request)
    {
      $request['room_id'] = (isset($request->room_id)?$request->room_id:encrypt(0));
      return view('attachments.create',$request->all());
    }

    /**
     * Edit Attachments
     */
    public function editAttachment(Request $request)
    {
      return view('attachments.edit',$request->all());
    }

}
