<?php

namespace App\Admin\Http\Controllers\Articles;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Articles\ArticlesRequest;
use App\Admin\Repositories\Articles\ArticlesRepositoryInterface;
use App\Admin\Services\Articles\ArticlesServiceInterface;
use App\Admin\DataTables\Articles\ArticlesDataTable;
use App\Admin\Repositories\Admin\AdminRepositoryInterface;
use App\Admin\Repositories\District\DistrictRepositoryInterface;
use App\Admin\Repositories\Ward\WardRepositoryInterface;
use App\Admin\Repositories\Province\ProvinceRepositoryInterface;
use App\Admin\Repositories\User\UserRepositoryInterface;
use App\Admin\Repositories\Areas\AreasRepositoryInterface;
use App\Admin\Repositories\Commission\CommissionRepositoryInterface;
use App\Admin\Repositories\HouseType\HouseTypeRepositoryInterface;
use App\Models\{District, Wards, HouseType};
use App\Enums\Article\{ArticleActiveStatus, ArticlePriceConsent, ArticleStatus, ArticleType, ArticleArticleStatus};

class ArticlesController extends Controller
{
    protected $repositoryUser;
    protected $repositoryDistrict;
    protected $repositoryWard;
    protected $repositoryProvince;
    protected $repositoryAdmin;
    protected $repositoryCommission;
    protected $repositoryArea;
    protected $repositoryHouseType;

    public function __construct(
        ArticlesRepositoryInterface $repository,
        ArticlesServiceInterface $service,
        AdminRepositoryInterface $repositoryAdmin,
        UserRepositoryInterface $repositoryUser,
        DistrictRepositoryInterface $repositoryDistrict,
        WardRepositoryInterface $repositoryWard,
        CommissionRepositoryInterface $repositoryCommission,
        ProvinceRepositoryInterface $repositoryProvince,
        AreasRepositoryInterface $repositoryArea,
        HouseTypeRepositoryInterface $repositoryHouseType,
    ) {

        parent::__construct();

        $this->repository = $repository;
        $this->repositoryAdmin = $repositoryAdmin;
        $this->repositoryUser = $repositoryUser;
        $this->repositoryDistrict = $repositoryDistrict;
        $this->repositoryWard = $repositoryWard;
        $this->repositoryProvince = $repositoryProvince;
        $this->repositoryCommission = $repositoryCommission;
        $this->repositoryArea = $repositoryArea;
        $this->repositoryHouseType = $repositoryHouseType;
        $this->service = $service;
    }


    public function getView()
    {
        return [
            'index' => 'admin.articles.index',
            'create' => 'admin.articles.create',
            'edit' => 'admin.articles.edit',
        ];
    }

    public function getRoute()
    {
        return [
            'index' => 'admin.articles.index',
            'create' => 'admin.articles.create',
            'edit' => 'admin.articles.edit',
            'delete' => 'admin.articles.delete',
        ];
    }
    public function index(ArticlesDataTable $dataTable)
    {
        return $dataTable->render($this->view['index']);
    }



    public function create()
    {
        $getCommission = $this->repositoryCommission->getCommission();
        $getHouseType = $this->repositoryHouseType->getHouseType();
        $selectedCommissionId = 1;
        $getAdmin = $this->repositoryAdmin->getCurrentAdminID();
        $getDistrict = $this->repositoryDistrict->getDistrict();
        $getProvince = $this->repositoryProvince->getProvince();
        $getWard = $this->repositoryWard->getWard();
        $getArea = $this->repositoryArea->getArea();
        return view(
            $this->view['create'],
            [
                'getHouseType' => $getHouseType,
                'getArea' => $getArea,
                'getAdmin' => $getAdmin,
                'activeStatus' => ArticleActiveStatus::asSelectArray(),
                'articleStatus' => ArticleArticleStatus::asSelectArray(),
                'getDistrict' => $getDistrict,
                'getWard' => $getWard,
                'getProvince' => $getProvince,
                'getCommission' => $getCommission,
                'selectedCommissionId' => $selectedCommissionId,
                'status' => ArticleStatus::asSelectArray(),
                'type' => ArticleType::asSelectArray(),
                'price_consent' => ArticlePriceConsent::asSelectArray(),
            ]
        );
    }

    public function getDistrictsByProvince($provinceCode)
    {
        $districts = District::where('province_code', $provinceCode)->get();
        return response()->json($districts);
    }

    public function getWardsByDistrict($districtCode)
    {
        $wards = Wards::where('district_code', $districtCode)->get();
        return response()->json($wards);
    }


    public function store(ArticlesRequest $request)
    {
        $response = $this->service->store($request);
        if ($response) {
            return to_route($this->route['edit'], $response->id)->with('success', __('notifySuccess'));
        }
        return back()->with('error', __('notifyFail'))->withInput();
    }

    public function edit($id)
    {
        $getCommission = $this->repositoryCommission->getCommission();
        $getDistrict = $this->repositoryDistrict->getDistrict();
        $getWard = $this->repositoryWard->getWard();
        $getProvince = $this->repositoryProvince->getProvince();
        $response = $this->repository->findOrFail($id);
        $getArea = $this->repositoryArea->getArea();
        if ($response->admin_id != null) {
            $admin = $response->articleAdmin;
            $authorName = $admin->username;
        } else {
            $user = $response->articleUser;
            $authorName = $user->username;
        }

        if ($response->user_id != null) {
            $userRole = $response->articleUser->roles;
        } else {
            $userRole = '';
        }

        $houseTypeIds = $response->houseType_id;


        $field = HouseType::whereIn('id', $houseTypeIds)->get();
        return view(
            $this->view['edit'],
            [
                'field' => $field,
                // 'getHouseType' => $getHouseType,
                'getArea' => $getArea,
                'status' => ArticleStatus::asSelectArray(),
                'type' => ArticleType::asSelectArray(),
                'articleStatus' => ArticleArticleStatus::asSelectArray(),
                'activeStatus' => ArticleActiveStatus::asSelectArray(),
                'price_consent' => ArticlePriceConsent::asSelectArray(),
                'articles' => $response,
                'authorName' => $authorName,
                'getCommission' => $getCommission,
                'getDistrict' => $getDistrict,
                'getProvince' => $getProvince,
                'getWard' => $getWard,
                'userRole' => $userRole,
            ]
        );
    }

    public function update(ArticlesRequest $request)
    {
        $this->service->update($request);
        return back()->with('success', __('notifySuccess'));
    }

    public function delete($id)
    {
        $this->service->delete($id);
        return to_route($this->route['index'])->with('success', __('notifySuccess'));
    }
}
