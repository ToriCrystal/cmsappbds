<?php

namespace App\Admin\Http\Controllers\CommissionDetail;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\CommissionDetail\CommissionDetailRequest;
use App\Admin\Repositories\CommissionDetail\CommissionDetailRepositoryInterface;
use App\Admin\Services\CommissionDetail\CommissionDetailServiceInterface;
use App\Admin\DataTables\CommissionDetail\CommissionDetailDataTable;
use App\Enums\CommissionDetail\CommissionDetailStatus;


class CommissionDetailController extends Controller
{
    public function __construct(
        CommissionDetailRepositoryInterface $repository, 
        CommissionDetailServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;

        
        $this->service = $service;
        
    }

    public function getView(){
        return [
            'index' => 'admin.commission_detail.index',
            'edit' => 'admin.commission_detail.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.commission_detail.index',
            'edit' => 'admin.commission_detail.edit',
            'delete' => 'admin.commission_detail.delete'
        ];
    }
    public function index(CommissionDetailDataTable $dataTable){
        return $dataTable->render($this->view['index'],[
            'status' => CommissionDetailStatus::asSelectArray(),
        ]);
    }

    public function store(CommissionDetailRequest $request){

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
                'commission_detail' => $response,
                'status' => CommissionDetailStatus::asSelectArray(),
            ]
        );

    }
 
    public function update(CommissionDetailRequest $request){

        $this->service->update($request);
        
        return back()->with('success', __('notifySuccess'));

    }

    public function delete($id){

        $this->service->delete($id);
        
        return to_route($this->route['index'])->with('success', __('notifySuccess'));
        
    }
}