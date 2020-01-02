<?php
use App\Food;
use App\Attachment; 
function selectFoodMenue($food_menu,$food_cat_id,$week_day_id)
{
  $foods = Food::all();
  $option = "<option value='' selected>انتخاب نماید.</option>";
  foreach ($food_menu as $menue)
  {
     if($menue->food_category_id==$food_cat_id && $menue->week_days_id==$week_day_id)
     {
       foreach ($foods as $food)
       {
         if($menue->food_id==$food->id)
         {
           $option .= '<option value='.$food->id.' selected>'.$food->name.'</option>';
         }
         else{
            $option .= '<option value='.$food->id.'>'.$food->name.'</option>';
         }
       }
     }
  }
  echo $option;
}


function organizeFoodMenue($food_menu,$week_day,$food_cat)
{
  foreach ($food_menu as $fm)
  {
     if($fm->urn==$week_day && $fm->food_cat==$food_cat)
     {
        return $fm->name;
     }
  }
}

/* =============
* Upload file Attachment
*/

/**
 * @Author: Jamal Yousufi
 * @Date: 2019-11-21 13:50:41
 * @Desc: Upload documents based on record id
 */

 if(!function_exists('uploadAttachments'))
 {
  function uploadAttachments($hostel_id=0,$room_id=0,$section=0,$file,$table)
  {
    if($table!='0')
    {
      // Getting all of the post data
      $errors = "";
  
        // Validating each file.
        $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
        $validator = Validator::make(
          [
              'file'      => $file,
              'extension' => Str::lower($file->getClientOriginalExtension()),
          ],
          [
              'file'      => 'required|max:500000',
              'extension' => 'required|in:jpg,JPG,jpeg,JPEG,png,PNG,doc,docx,pdf,xls,ppt,pptx,xlsx'
          ]
        );
        if($validator->passes())
        {
          // Path is pmis/public/attachments/pmis...
          $destinationPath = 'attachments/'.$table;
          $fileOrgName     = $file->getClientOriginalName();
          $fileExtention   = $file->getClientOriginalExtension();
          $fileOrgSize     = $file->getSize();

          $name = explode('.', $fileOrgName)[0];
          $file_name = $fileOrgName;

          $upload_success = $file->move($destinationPath, $file_name);
          if($upload_success)
          {
            //Insert Record
            $data = [
                'hostel_id'  => $hostel_id,
                'room_id'    => $room_id,
                'file_name'  => $file_name,
                'file_path'  => $destinationPath."/".$file_name,
            ];

            if($section!=0)
            {
              $data['section'] = $section;
            }

            DB::table($table)->insert($data);
            return true;
          }
          else
          {
              $errors .= json('error', 400);
          }
        }
        else
        {
          // Return false.
          return false;
        }
      
    }
  }
 }


 /**
  * @Author: Jamal Yousufi
  * @Date: 2019-12-02 09:38:40
  * @Desc: Get Design Attachment
  */

  function getAttachments($table,$hostel_id='',$room_id='',$section='')
  {
    $query = DB::table($table)->select('*');
    if($hostel_id!='')
      $query->where('hostel_id',$hostel_id);
    if($room_id!='')
      $query->where('room_id',$room_id);
    if($section!='')
      $query->where('section',$section);

     return $query->orderBy('id','desc')->get();

  }

  function getAuthenticateUser()
  {
     // return Auth::user();
     return $owner = DB::table('owners')->first();
  }
  function getFacility()
  {
      return $facility = DB::table('facilities');
  }

  // function getHostelFacility()
  // {
  //   $hostel_id = Session::get('hostel_id');//get the session id
  //   return $hostel_id;
  // //  $hostel_facility_id = DB::table('facilitie_hostel')->get('hostel_id'); // get the hostel id from facility_hostel table
  //
  //    //if($hostel_id == $hostel_facility_id)
  //   // {
  //   //   Return $hostel_id;
  //   //   $facility_id = DB::table('facilitie_hostel')->get('facility_id');// get the facility_id from facilitie_hostel table
  //   //   if($facility_id){
  //   //     $room_facility = DB::table('facilities')->get('facility_name');
  //   //     return $room_facility ;
  //   //   }
  // //   }
  // }
  function ddd($resultl)
  {
    echo "<pre/>"; print_r($resultl); exit;
  }

  function inserOrUpdatetAttachment($table='',$data=array(),$request)
  {
    if($request->is_edit)
    {
      return $result = DB::table($table)->where('id',decrypt($request->id))->update($data);  
    }
    else
    {
      return DB::table($table)->insert($data);
    }
  }

  // Delete the physical file 
  function deleteFile($table,$request,$delete_file=false)
  {
    if($delete_file)
    {
       $attachmet = Attachment::where('id',decrypt($request->id))->first(); 
       $file= public_path()."/".$attachmet->path;
       if(File::delete($file))
        return true; 
       else 
        return false;  
    }
  }


  /** 
   * Success Message   
   */  
  function successMessage($message)
  {
    return  '<div class="m-alert m-alert--icon m-alert--outline alert alert-success alert-dismissible fade show col-lg-12" role="alert">
                  <div class="m-alert__icon"><i class="la la-check-square"></i></div>
                  <div class="m-alert__text">'.$message.'</div>
                  <div class="m-alert__close"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button></div>
                </div>
              ';
  }

  /** 
   * @Date: 2019-12-17 14:48:34 
   * @Desc:  Error Message  
   */ 
  function errorMessage($message)
  {
    return  '<div class="m-alert m-alert--icon m-alert--outline alert alert-warning alert-dismissible fade show col-lg-12" role="alert">
                  <div class="m-alert__icon"><i class="la la-warning"></i></div>
                  <div class="m-alert__text">'.$message.'</div>
                  <div class="m-alert__close"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button></div>
                </div>
              ';
  }
  

 ?>
