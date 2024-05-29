<?php

namespace App\Admin\Repositories\Contact_admin;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Contact_admin\Contact_adminRepositoryInterface;
use App\Models\ContactAdmin;

class Contact_adminRepository extends EloquentRepository implements Contact_adminRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return ContactAdmin::class;
    }


    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}