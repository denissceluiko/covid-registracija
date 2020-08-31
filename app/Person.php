<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Person extends Model
{
    protected $fillable = ['name', 'surname', 'code', 'phone'];
    protected static $cookieName = '5g_implant';
    protected static $cookieLifetime = 43200; // 30 days

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

    public static function extract()
    {
        Cookie::queue(Cookie::forget(self::$cookieName));
    }

    public static function implant(string $code)
    {
        Cookie::queue(Cookie::make(self::$cookieName, $code, self::$cookieLifetime));
    }

    public static function check()
    {
        return Cookie::has(self::$cookieName);
    }

    public static function identify()
    {
        if (!self::check()) return null;
        return self::byCode(Cookie::get(self::$cookieName));
    }
}
