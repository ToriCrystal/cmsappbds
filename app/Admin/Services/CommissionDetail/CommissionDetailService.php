<?php

namespace App\Admin\Services\CommissionDetail;

use App\Admin\Services\CommissionDetail\CommissionDetailServiceInterface;
use  App\Admin\Repositories\CommissionDetail\CommissionDetailRepositoryInterface;
use Illuminate\Http\Request;

class CommissionDetailService implements CommissionDetailServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    
    protected $repository;

    public function __construct(CommissionDetailRepositoryInterface $repository){
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