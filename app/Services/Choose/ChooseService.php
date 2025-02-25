<?php
namespace app\Services\Chooes;

use App\Models\Choose;
use App\Traits\CrudTrait;

class ChooesService
{
    use CrudTrait;



    protected $model;

    public function __construct(Choose $choose)
    {
        $this->model = $choose;
    }
    
}
//
