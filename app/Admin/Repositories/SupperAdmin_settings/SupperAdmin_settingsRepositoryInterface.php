<?php

namespace App\Admin\Repositories\SupperAdmin_settings;
use App\Admin\Repositories\EloquentRepositoryInterface;

interface SupperAdmin_settingsRepositoryInterface extends EloquentRepositoryInterface
{
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
}