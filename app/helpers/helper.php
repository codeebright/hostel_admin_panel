<?php
use App\Food;
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


 if(!function_exists('uploadAttachments'))
 {
  function uploadAttachments($hostel_id=0,$room_id=0,$section=0,$file,$table)
  {
    if($table!='0')
    {
      // Getting all of the post data
      $errors = "";
      if(count($file)>0)
      {
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
      else
      {
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

     return $query->orderBy('file_id','desc')->get();

  }

  function getAuthenticateUser()
  {
      return Auth::user();
  //  return $owner = DB::table('users')->first();
  }
  function getFacility()
  {
      return $facility = DB::table('facilities');
  }

  function ddd($resultl)
  {
    echo "<pre/>"; print_r($resultl); exit;
  }


 ?>
