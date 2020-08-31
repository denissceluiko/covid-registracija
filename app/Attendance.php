<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Attendance extends Pivot
{
    public $incrementing = true;

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
