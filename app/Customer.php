<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Notifications\Notifiable;
class Customer extends Model
{
    //
    use Notifiable;
    protected $fillable =[
      'phone', 'room_id' , 'hostel_id'
      ] ;

    public  function rooms()
    {
        return $this->belongsTo(Attachment::class);
    }
}
