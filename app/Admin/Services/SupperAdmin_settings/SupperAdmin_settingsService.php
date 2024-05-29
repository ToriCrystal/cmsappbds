<?php

namespace App\Admin\Services\SupperAdmin_settings;

use App\Admin\Services\SupperAdmin_settings\SupperAdmin_settingsServiceInterface;
use  App\Admin\Repositories\SupperAdmin_settings\SupperAdmin_settingsRepositoryInterface;
use Illuminate\Http\Request;

class SupperAdmin_settingsService implements SupperAdmin_settingsServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    
    protected $repository;

    public function __construct(SupperAdmin_settingsRepositoryInterface $repository){
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