<?php

namespace App\Admin\Services\Commission;

use App\Admin\Services\Commission\CommissionServiceInterface;
use  App\Admin\Repositories\Commission\CommissionRepositoryInterface;
use Illuminate\Http\Request;

class CommissionService implements CommissionServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    
    protected $repository;

    public function __construct(CommissionRepositoryInterface $repository){
        $this->repository = $repository;
    }
    
    public function store(Request $request){

        $this->data = $request->validated();
        return $this->repository->create($this->data);
    }

    public function update(Request $request){
        
        $this->data = $request->validated();

        return $this->repository->update($this->data['id'], $this->data);

    }

    public function delete($id){
        return $this->repository->delete($id);

    }

}