<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $primarykey = 'id';
    protected $guarded = ['file_size'];


    public function hostels()
    {
      return $this->belongsTo(Hostel::class);
    }

    public function homes()
    {
      return $this->belongsTo(Home::class);
    }

    public function rooms()
    {
      return $this->belongsTo(Hostel::class);
    }
}
