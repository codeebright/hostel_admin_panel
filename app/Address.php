<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['province','state','rood','alley','station','home_number','hostel_id'];
    // Address belongs to hostel
    public function hostel()
    {
      return $this->belongsTo(Hostel::class);
    }
}
