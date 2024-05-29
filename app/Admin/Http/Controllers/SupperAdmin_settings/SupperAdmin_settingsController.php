<?php

namespace App\Admin\Http\Controllers\SupperAdmin_settings;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\SupperAdmin_settings\SupperAdmin_settingsRequest;
use App\Admin\Repositories\SupperAdmin_settings\SupperAdmin_settingsRepositoryInterface;
use App\Admin\Services\SupperAdmin_settings\SupperAdmin_settingsServiceInterface;
use App\Admin\DataTables\SupperAdmin_settings\SupperAdmin_settingsDataTable;


class SupperAdmin_settingsController extends Controller
{
    public function __construct(
        SupperAdmin_settingsRepositoryInterface $repository, 
        SupperAdmin_settingsServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;

        
        $this->service = $service;
        
    }

    public function getView(){
        return [
            'index' => 'admin.supperAdmin_settings.index',
            'create' => 'admin.supperAdmin_settings.create',
            'edit' => 'admin.supperAdmin_settings.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.supperAdmin_settings.index',
            'create' => 'admin.supperAdmin_settings.create',
            'edit' => 'admin.supperAdmin_settings.edit',
            'delete' => 'admin.supperAdmin_settings.delete'
        ];
    }
    public function index(SupperAdmin_settingsDataTable $dataTable){
        return $dataTable->render($this->view['index']);
    }

    public function create(){

        return view($this->view['create']);
    }

    public function store(SupperAdmin_settingsRequest $request){

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
                'supperAdmin_settings' => $response
            ]
        );

    }
 
    public function update(SupperAdmin_settingsRequest $request){

        $this->service->update($request);

        return back()->with('success', __('notifySuccess'));

    }

    public function delete($id){

        $this->service->delete($id);
        
        return to_route($this->route['index'])->with('success', __('notifySuccess'));
        
    }
}