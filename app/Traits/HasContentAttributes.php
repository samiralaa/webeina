<?php

namespace App\Traits;

trait HasContentAttributes
{
    public function getTitleAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = json_encode($value);
    }

    public function getDescriptionAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = json_encode($value);
    }

    public function getImageAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = json_encode($value);
    }

    public function getColorAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setColorAttribute($value)
    {
        $this->attributes['color'] = json_encode($value);
    }

    public function getStatusAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = json_encode($value);
    }

    public function getQustionAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setQustionAttribute($value)
    {
        $this->attributes['qustion'] = json_encode($value);
    }
}
