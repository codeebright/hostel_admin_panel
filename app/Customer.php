<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use notifiable;
class Customer extends Model
{
    //

    protected $fillable =[
      'phone'
      ] ;

    public function rooms()
    {
        return $this->belongsToMany(Attachment::class ,'customer_room' ,'customer_id' , 'room_id');
    }
}
