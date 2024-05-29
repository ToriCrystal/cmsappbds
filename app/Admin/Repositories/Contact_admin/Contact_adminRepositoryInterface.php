<?php

namespace App\Admin\Repositories\Contact_admin;
use App\Admin\Repositories\EloquentRepositoryInterface;

interface Contact_adminRepositoryInterface extends EloquentRepositoryInterface
{
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC');
}