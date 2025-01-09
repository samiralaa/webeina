<?php
namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class UppercaseCast implements CastsAttributes
{
    // لما تجيب الداتا من الداتا بيز
    public function get($model, string $key, $value, array $attributes)
    {
        return strtoupper($value);
    }

    // لما تكتب الداتا للداتا بيز
    public function set($model, string $key, $value, array $attributes)
    {
        return strtolower($value);
    }
}
