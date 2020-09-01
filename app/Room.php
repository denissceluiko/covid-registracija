<?php

namespace App;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Room extends Model
{
    protected $guarded = [];

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

    public function qrCode()
    {
        $options = new QROptions([
            'version'    => 5,
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel'   => QRCode::ECC_M,
        ]);

        // invoke a fresh QRCode instance
        $qrcode = new QRCode($options);

        // and dump the output
        return $qrcode->render(route('room.show', $this->code));
    }

    public static function newCode()
    {
        do {
            $code = Str::random(6);
            $tmp = static::byCode($code);
        } while($tmp);
        return $code;
    }

    public static function create(array $attributes = [])
    {
        if (!key_exists('code', $attributes))
        {
            $attributes['code'] = static::newCode();
        }
        return static::query()->create($attributes);
    }
    public function getRouteKeyName()
    {
        return 'code';
    }
}
