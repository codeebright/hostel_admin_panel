<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Notifications\Notifiable;
class Customer extends Model
{
    //
 use Notifiable;
    protected $fillable =[
      'phone'
      ] ;

    public function rooms()
    {
        return $this->belongsToMany(Attachment::class ,'customer_room' ,'customer_id' , 'room_id');
    }
}
