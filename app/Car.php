<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'photo', 'price', 'places', 'suitcase', 'portes', 'automatique', 'audio_input', 'bluetouth', 'heatedseats', 'air_conditioner', 'allwheeldrive', 'usb_input', 'fm_radio', 'date_entry', 'consumption_ratio', 'deleted_at'
    ];
}
