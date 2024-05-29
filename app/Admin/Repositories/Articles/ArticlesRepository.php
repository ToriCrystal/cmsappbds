<?php

namespace App\Admin\Repositories\Articles;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Articles\ArticlesRepositoryInterface;
use App\Models\Articles;

class ArticlesRepository extends EloquentRepository implements ArticlesRepositoryInterface
{

    protected $select = [];

    public function getModel()
    {
        return Articles::class;
    }
    public function searchAllLimit($keySearch = '', $meta = [], $select = ['id', 'title', 'code'], $limit = 10)
    {
        $this->instance = $this->model->select($select);
        $this->getQueryBuilderFindByKey($keySearch);

        foreach ($meta as $key => $value) {
            $this->instance = $this->instance->where($key, $value);
        }

        return $this->instance->limit($limit)->get();
    }


    protected function getQueryBuilderFindByKey($key)
    {
        $this->instance = $this->instance->where(function ($query) use ($key) {
            return $query->where('title', 'LIKE', '%' . $key . '%')
                ->orWhere('code', 'LIKE', '%' . $key . '%')
                ->orWhere('slug', 'LIKE', '%' . $key . '%')
                ->orWhere('utilities', 'LIKE', '%' . $key . '%');
        });
    }
    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC')
    {
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }

    public function attachCategories(Articles $articles, array $houseTypeId)
    {
        return $articles->categories()->attach($houseTypeId);
    }

    public function syncCategories(Articles $articles, array $houseTypeId)
    {
        return $articles->categories()->sync($houseTypeId);
    }
}
