<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ourinformation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'address','url_facebook','url_twitter','url_instagrame','url_maps','email','about','slider_img_i','slider_img_ii','slider_img_iii','telephone','start_work_from','end_work_to'
    ];
}
