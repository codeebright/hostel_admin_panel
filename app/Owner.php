<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    //
    protected $table = 'owners';
    protected $guarded = ['password','password_confirm'];
    protected $fillable = ['name','email','phone_number','fb','Insta','linkedIn','twitter'];

    // hostel has hostel
    public function hostel()
    {
        return $this->hasMany(Hostel::class);
    }
}
