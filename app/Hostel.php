<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use notifiable;

class Hostel extends Model
{
    protected $fillable = ['owner_id','name','phone','email','description','type','website','fb','file_id','remark',];
    // has one details
    public function hostelDetails()
    {
      return $this->hasOne(HostelDetails::Class);
    }

    // hostel has one address
    public function address()
    {
      return $this->hasOne(Address::class);
    }

    // hostel has facilities
    public function facility()
    {
        return $this->belongsToMany(Facility::class , 'facilitie_hostel' , 'hostel_id' ,'facility_id');
    }

    // hostel has food_menu
    public function foodMenus()
    {
        return $this->hasOne(FoodMenu::class);
    }

        // hostel has many photos
    public function attachments()
        {
            return $this->hasMany(Attachment::class);
        }
    // hostel has many rooms
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
