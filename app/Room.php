<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = ['_token'];

    // rooms belongs to hostel

    public function hostels()
    {
        return $this->belongsTo(Hostel::class);
    }
    public function attachment()
    {
        return $this->hasMany(Attachment::class);
    }
    public function customers()
    {
        return $this->belongsToMany(Customer::class ,'customer_room' ,'room_id' , 'customer_id');
    }
}
