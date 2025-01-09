<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmitService extends Model
{
    protected $table ='submit_services';
     
    protected $fillable = ['user_id','service_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
