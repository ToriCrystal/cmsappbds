<?php

namespace App\Admin\Services\Articles;

use App\Admin\Services\Articles\ArticlesServiceInterface;
use  App\Admin\Repositories\Articles\ArticlesRepositoryInterface;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ArticlesService implements ArticlesServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;

    protected $repository;

    public function __construct(ArticlesRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {

        $this->data = $request->validated();
        $houseTypeId = $this->data['articles']['houseType_id'];

        // unset($this->data['articles']['houseType_id']);
        DB::beginTransaction();
        try {
            $this->data['articles']['image'] = $this->data['articles']['image'] ? explode(",", $this->data['articles']['image']) : null;
            $articles = $this->repository->create($this->data['articles']);
            $this->repository->attachCategories($articles, $houseTypeId);
            DB::commit();
            return $articles;
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return false;
        }
    }

    public function update(Request $request)
    {
        $this->data = $request->validated();
        $houseTypeId = $this->data['articles']['houseType_id'];
        DB::beginTransaction();
        try {
            $this->data['articles']['image'] = $this->data['articles']['image'] ? explode(",", $this->data['articles']['image']) : null;
            $articles = $this->repository->update($this->data['articles']['id'], $this->data['articles']);
            $this->repository->syncCategories($articles, $houseTypeId);
            DB::commit();
            return $articles;
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return false;
        }
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}


