<?php

namespace App\Admin\Http\Controllers\Contact_admin;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Contact_admin\Contact_adminRequest;
use App\Admin\Repositories\Contact_admin\Contact_adminRepositoryInterface;
use App\Admin\Services\Contact_admin\Contact_adminServiceInterface;
use App\Admin\DataTables\Contact_admin\Contact_adminDataTable;


class Contact_adminController extends Controller
{
    public function __construct(
        Contact_adminRepositoryInterface $repository, 
        Contact_adminServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;

        
        $this->service = $service;
        
    }

    public function getView(){
        return [
            'index' => 'admin.contact_admin.index',
            'create' => 'admin.contact_admin.create',
            'edit' => 'admin.contact_admin.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.contact_admin.index',
            'create' => 'admin.contact_admin.create',
            'edit' => 'admin.contact_admin.edit',
            'delete' => 'admin.contact_admin.delete'
        ];
    }
    public function index(Contact_adminDataTable $dataTable){
        return $dataTable->render($this->view['index']);
    }

    public function create(){

        return view($this->view['create']);
    }

    public function store(Contact_adminRequest $request){

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
                'contact_admin' => $response
            ]
        );

    }
 
    public function update(Contact_adminRequest $request){

        $this->service->update($request);

        return back()->with('success', __('notifySuccess'));

    }

    public function delete($id){

        $this->service->delete($id);
        
        return to_route($this->route['index'])->with('success', __('notifySuccess'));
        
    }
}