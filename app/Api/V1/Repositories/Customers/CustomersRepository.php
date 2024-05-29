<?php

namespace App\Api\V1\Repositories\Customers;
use App\Admin\Repositories\Customers\CustomersRepository as AdminCustomersRepository;
use App\Api\V1\Repositories\Customers\CustomersRepositoryInterface;
use App\Models\Customers;

class CustomersRepository extends AdminCustomersRepository implements CustomersRepositoryInterface
{
    public function getModel(){
        return Customers::class;
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
            Customers::findOrFail($id)->delete();
            return 1;
        } catch (\Exception $e) {
            return 0;
        } 
    }
}