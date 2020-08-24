<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['name', 'surname', 'code', 'phone'];

    public function attended()
    {
        return $this->belongsToMany(Room::class, 'attendance')
            ->using(Attendance::class)
            ->withTimestamps();
    }

    public static function byCode($code)
    {
        return self::where('code', $code)->first();
    }
}
