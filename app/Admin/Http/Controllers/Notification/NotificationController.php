<?php

namespace App\Admin\Http\Controllers\Notification;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Notification\NotificationRequest;
use App\Admin\Repositories\Notification\NotificationRepositoryInterface;
use App\Admin\Services\Notification\NotificationServiceInterface;
use App\Admin\DataTables\Notification\NotificationDataTable;
use App\Enums\Notification\NotificationEnum;
use App\Models\Notification;
use App\Models\User;


class NotificationController extends Controller
{
    public function __construct(
        NotificationRepositoryInterface $repository,
        NotificationServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;


        $this->service = $service;

    }

    public function getView(){
        return [
            'index' => 'admin.notification.index',
            'create' => 'admin.notification.create',
            'edit' => 'admin.notification.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.notification.index',
            'create' => 'admin.notification.create',
            'edit' => 'admin.notification.edit',
            'delete' => 'admin.notification.delete'
        ];
    }
    public function index(NotificationDataTable $dataTable){
        return $dataTable->render($this->view['index'],[
            'status' => NotificationEnum::asSelectArray(),
        ]);
    }

    public function create(){
        $usernames = User::pluck('username', 'id');
        return view($this->view['create'], [
            'status' => NotificationEnum::asSelectArray(),
            'usernames' => $usernames,
        ]);
    }

    public function store(NotificationRequest $request)
    {
        $response = $this->service->store($request);
        if ($response) {
            return to_route($this->route['index'])->with('success', __('Thêm thành công'))->withInput();
        }
        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function edit($id){
        $fullnames = User::pluck('fullname', 'id');
        $response = $this->repository->findOrFail($id);
        return view($this->view['edit'], [
            'status' => NotificationEnum::asSelectArray(),
            'notification' => $response,
            'fullname' => $fullnames
        ]);

    }

    public function update(NotificationRequest $request){

        $this->service->update($request);

        return back()->with('success', __('notifySuccess'));

    }

    public function delete($id){

        $this->service->delete($id);

        return to_route($this->route['index'])->with('success', __('notifySuccess'));

    }
}
