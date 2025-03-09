<?php

namespace App\Models;

use App\Casts\UppercaseCast;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'message','service_id','business_email','company'];

    protected $casts = [
        'name' => UppercaseCast::class,
    ];

    public function service(){
        return $this->belongsTo(Service::class);
    }

}
