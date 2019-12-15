<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = ['_token'];

    // rooms belongs to hostel

    public function rooms()
    {
        return $this->belongsTo(Room::class);
    }
    public function attachment()
    {
        return $this->hasMany(Attachment::class);
    }
}
