<?php

namespace App\Admin\Repositories\Ward;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Ward\WardRepositoryInterface;
use App\Models\Wards;

class WardRepository extends EloquentRepository implements WardRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return Wards::class;
    }
    
    public function getWard(){
        return Wards::all();
    }
}