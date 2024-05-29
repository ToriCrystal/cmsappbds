<?php

namespace App\Admin\Repositories\CommissionDetail;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\CommissionDetail\CommissionDetailRepositoryInterface;
use App\Models\CommissionDetail;

class CommissionDetailRepository extends EloquentRepository implements CommissionDetailRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return CommissionDetail::class;
    }

    public function where($field, $value)
    {
        // Trả về một câu truy vấn sẵn sàng
        return CommissionDetail::where($field, $value);
    }


    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
    
}