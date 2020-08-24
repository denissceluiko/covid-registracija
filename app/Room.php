<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function attendees()
    {
        return $this->belongsToMany(Person::class, 'attendance')
            ->using(Attendance::class)
            ->withTimestamps();
    }

    public static function byCode($code)
    {
        return self::where('code', $code)->first();
    }
}
