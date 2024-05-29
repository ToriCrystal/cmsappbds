<?php

namespace App\Api\V1\Repositories\Articles;
use App\Admin\Repositories\Articles\ArticlesRepository as AdminArticlesRepository;
use App\Api\V1\Repositories\Articles\ArticlesRepositoryInterface;
use App\Models\Articles;

class ArticlesRepository extends AdminArticlesRepository implements ArticlesRepositoryInterface
{
    public function getModel(){
        return Articles::class;
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
            Articles::findOrFail($id)->delete();
            return 1;
        } catch (\Exception $e) {
            return 0;
        } 
    }
}