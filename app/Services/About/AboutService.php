<?php

namespace App\Services\About;

use App\Models\Section;
use App\Traits\CrudTrait;

class AboutService
{

    use CrudTrait;
    protected $model;

    public function __construct(Section $package)
    {
        $this->model = $package;
    }

    public function getAbout()
    {
        $relation = ['images', 'section_info', 'sliders'];
        $where    = ['page_type' => 'about'];
        $select   = ['*'];
        $result = $this->getAllByUsedWhereAndUsedRelation($relation, $where, $select);
        return $result;
    }
}
