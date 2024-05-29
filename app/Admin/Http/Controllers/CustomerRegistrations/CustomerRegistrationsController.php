<?php

namespace App\Admin\Http\Controllers\CustomerRegistrations;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\CustomerRegistrations\CustomerRegistrationsRequest;
use App\Admin\Repositories\Articles\ArticlesRepositoryInterface;
use App\Admin\Repositories\CustomerRegistrations\CustomerRegistrationsRepositoryInterface;
use App\Admin\Repositories\Customers\CustomersRepositoryInterface;
use App\Admin\Services\CustomerRegistrations\CustomerRegistrationsServiceInterface;
use App\Admin\DataTables\CustomerRegistrations\CustomerRegistrationsDataTable;
use App\Enums\CustomerRegistration\CustomerRegistrationStatus;


class CustomerRegistrationsController extends Controller
{
    public function __construct(
        CustomerRegistrationsRepositoryInterface $repository,
        CustomersRepositoryInterface $customersRepository,
        ArticlesRepositoryInterface $articlesRepository,
        CustomerRegistrationsServiceInterface $service,
    ) {

        parent::__construct();

        $this->repository = $repository;
        $this->customersRepository = $customersRepository;
        $this->articlesRepository = $articlesRepository;
        $this->service = $service;
    }

    public function getView()
    {
        return [
            'index' => 'admin.customerRegistrations.index',
            'create' => 'admin.customerRegistrations.create',
            'edit' => 'admin.customerRegistrations.edit'
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.customerRegistration.index',
            'create' => 'admin.customerRegistration.create',
            'edit' => 'admin.customerRegistration.edit',
            'delete' => 'admin.customerRegistration.delete'
        ];
    }
    public function index(CustomerRegistrationsDataTable $dataTable)
    {
        return $dataTable->render($this->view['index'], [

            'status' => CustomerRegistrationStatus::asSelectArray()
        ]);
    }

    public function create()
    {
        return view($this->view['create'], [
            'status' => CustomerRegistrationStatus::asSelectArray()
        ]);
    }

    public function store(CustomerRegistrationsRequest $request)
    {

        $response = $this->service->store($request);
        if ($response) {

            return to_route($this->route['edit'], $response->id)->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function edit($id)
    {
        $response = $this->repository->findOrFail($id);
        $customerinfo = $this->customersRepository->findOrFail($response->customer_id);
        $articleinfo = $this->articlesRepository->findOrFail($response->article_id);


        return view(
            $this->view['edit'],
            [
                'customerRegistrations' => $response,
                'customerinfo' => $customerinfo,
                'articleinfo' => $articleinfo,
                'status' => CustomerRegistrationStatus::asSelectArray(),
            ]
        );
    }

    public function update(CustomerRegistrationsRequest $request)
    {
        $id = $request->input('id');
        $this->service->update($request);
        $this->service->handleUpdate($id);
        return back()->with('success', __('notifySuccess'));
    }

    public function delete($id)
    {

        $this->service->delete($id);

        return to_route($this->route['index'])->with('success', __('notifySuccess'));
    }
}
