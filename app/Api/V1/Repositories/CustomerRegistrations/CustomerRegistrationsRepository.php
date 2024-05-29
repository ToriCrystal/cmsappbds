<?php

namespace App\Api\V1\Repositories\CustomerRegistrations;
use App\Admin\Repositories\CustomerRegistrations\CustomerRegistrationsRepository as AdminCustomerRegistrationsRepository;
use App\Api\V1\Repositories\CustomerRegistrations\CustomerRegistrationsRepositoryInterface;
use App\Models\CustomerRegistrations;

class CustomerRegistrationsRepository extends AdminCustomerRegistrationsRepository implements CustomerRegistrationsRepositoryInterface
{
    public function getModel(){
        return CustomerRegistrations::class;
    }
	
    public function findByID($id)
    {
        $this->instance = $this->model->where('id', $id)
        ->firstOrFail();
		
        if ($this->instance && $this->instance->exists()) {
			return $this->instance;
		}

		return null;
    }
    public function paginate($page = 1, $limit = 10)
    {
        $page = $page ? $page - 1 : 0;
        $this->instance = $this->model
        ->offset($page * $limit)
        ->limit($limit)
        ->orderBy('id', 'desc')
        ->get();
        return $this->instance;
    }
	public function delete($id)
    {
        try {
            CustomerRegistrations::findOrFail($id)->delete();
            return 1;
        } catch (\Exception $e) {
            return 0;
        } 
    }
}