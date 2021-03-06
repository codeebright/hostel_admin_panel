<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Facility extends Model{
    // facilities belongsTo hostel
    protected $fillable = ['facility_name'];
    public function hostel()
    {
        return $this->belongsToMany(Hostel::class ,'facilitie_hostel' ,'facility_id' , 'hostel_id');
    }
}
