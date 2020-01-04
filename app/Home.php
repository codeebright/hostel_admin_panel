<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB; 
class Home extends Model
{

  public static function updateFileRecord($table,$id,$data)
  {
    return DB::table($table)->whereId($id)->update($data);
  }

  public static function getFile($table='',$id=0)
  {
    return DB::table($table)->where('id',$id)->first();
  }

  /** 
   * @Author: Ramazan Yousuti   
   * @Date: 2019-12-17 13:51:51 
   * @Desc: Delete Record   
   */  
  public static function deleteRecord($table='',$condition=array())
  {
     return DB::table($table)->where($condition)->delete(); 
  }
  
}
