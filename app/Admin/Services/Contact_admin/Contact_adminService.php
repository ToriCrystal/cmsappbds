<?php

namespace App\Admin\Services\Contact_admin;

use App\Admin\Services\Contact_admin\Contact_adminServiceInterface;
use  App\Admin\Repositories\Contact_admin\Contact_adminRepositoryInterface;
use Illuminate\Http\Request;

class Contact_adminService implements Contact_adminServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    
    protected $repository;

    public function __construct(Contact_adminRepositoryInterface $repository){
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