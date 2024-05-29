<?php

namespace App\Api\V1\Repositories\Contact_admin;
use App\Admin\Repositories\EloquentRepositoryInterface;


interface Contact_adminRepositoryInterface extends EloquentRepositoryInterface
{
    public function findByID($id);
    public function paginate($page = 1, $limit = 10);
    public function delete($id);
}