<?php

namespace App\Admin\Http\Controllers\Commission;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Commission\CommissionRequest;
use App\Admin\Repositories\Commission\CommissionRepositoryInterface;
use App\Admin\Services\Commission\CommissionServiceInterface;
use App\Admin\DataTables\Commission\CommissionDataTable;


class CommissionController extends Controller
{
    public function __construct(
        CommissionRepositoryInterface $repository, 
        CommissionServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;

        
        $this->service = $service;
        
    }

    public function getView(){
        return [
            'index' => 'admin.commission.index',
            'create' => 'admin.commission.create',
            'edit' => 'admin.commission.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.commission.index',
            'create' => 'admin.commission.create',
            'edit' => 'admin.commission.edit',
            'delete' => 'admin.commission.delete'
        ];
    }
    public function index(CommissionDataTable $dataTable){
        return $dataTable->render($this->view['index']);
    }

    public function create(){

        return view($this->view['create']);
    }

    public function store(CommissionRequest $request){

        $response = $this->service->store($request);
        if($response){
            return to_route($this->route['edit'], $response->id)->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function edit($id){
        $response = $this->repository->findOrFail($id);
        return view(
            $this->view['edit'],
            [
                'commission' => $response
            ]
        );

    }
 
    public function update(CommissionRequest $request){

        $this->service->update($request);

        return back()->with('success', __('notifySuccess'));

    }

    public function delete($id){

        $this->service->delete($id);
        
        return to_route($this->route['index'])->with('success', __('notifySuccess'));
        
    }
}