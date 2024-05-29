<?php

namespace App\Admin\Repositories\Areas;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Areas\AreasRepositoryInterface;
use App\Models\Areas;

class AreasRepository extends EloquentRepository implements AreasRepositoryInterface
{

    protected $select = [];

    public function getModel()
    {
        return Areas::class;
    }

    
    public function getArea()
    {
        return Areas::all();
    }

    // public function getAllAdmin() {
    //     $this->getQueryBuilder(); 
    //     $this->instance = $this->instance->with('articleAdmin')->get();
    //     return $this->instance;
    // }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC')
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}
