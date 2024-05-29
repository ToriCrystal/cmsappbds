<?php

namespace App\Admin\Repositories\SupperAdmin_settings;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\SupperAdmin_settings\SupperAdmin_settingsRepositoryInterface;
use App\Models\SupperAdmin_settings;

class SupperAdmin_settingsRepository extends EloquentRepository implements SupperAdmin_settingsRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return SupperAdmin_settings::class;
    }


    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}