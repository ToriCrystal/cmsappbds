<?php

namespace App\Admin\Services\CustomerRegistrations;

use App\Admin\Services\CustomerRegistrations\CustomerRegistrationsServiceInterface;
use  App\Admin\Repositories\CustomerRegistrations\CustomerRegistrationsRepositoryInterface;
use Illuminate\Http\Request;
use App\Admin\Repositories\Articles\ArticlesRepositoryInterface;
use App\Admin\Repositories\CommissionDetail\CommissionDetailRepositoryInterface;
use App\Admin\Repositories\Commission\CommissionRepositoryInterface;
use App\Admin\Repositories\User\UserRepositoryInterface;

class CustomerRegistrationsService implements CustomerRegistrationsServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;

    protected $repository;
    protected $articlesRepository;
    protected $commissionDetailRepository;
    protected $commissionRepository;
    protected $userRepository;

    public function __construct(
        CustomerRegistrationsRepositoryInterface $repository,
        ArticlesRepositoryInterface $articlesRepository,
        CommissionDetailRepositoryInterface $commissionDetailRepository,
        CommissionRepositoryInterface $commissionRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->articlesRepository = $articlesRepository;
        $this->commissionDetailRepository = $commissionDetailRepository;
        $this->commissionRepository = $commissionRepository;
        $this->repository = $repository;
        $this->userRepository = $userRepository;
    }

    public function store(Request $request){

        $this->data = $request->validated();
        $this->data['customer_id'] = $request->customer_id;
        $this->data['article_id'] = $request->article_id;
        $this->data['status'] = $request->status ?? 1;
        $this->data['registration_day'] = $request->registration_day;
        $this->data['approval_day'] = $request->approval_day;
        return $this->repository->create($this->data);
    }

    public function update(Request $request){

        $this->data = $request->validated();

        return $this->repository->update($this->data['id'], $this->data);

    }

    public function delete($id){
        return $this->repository->delete($id);

    }

    public function handleUpdate($registrationId)
    {
        $customerRegistrations = $this->repository->findOrFail($registrationId);
        if ($customerRegistrations->status->value == 2) {
            $articlesId = $customerRegistrations->article_id;

            // Lấy user_id,commission_id từ bảng articles dựa trên articles_id
            $article = $this->articlesRepository->findOrFail($articlesId);
            $userId = $article->user_id;
            $price = $article->price;
            $commissionId = $article->commission_id;

            // Kiểm tra user_role của user
            $userRole = $this->userRepository->getUserRoleById($userId);
            $userRoleValue = $userRole ? $userRole->value : null; // Giá trị của enum UserRoles check userId có tồn tại hay không

            if ($userRoleValue == 2) {
                // Cập nhật commission_detail tương ứng
                $commissionDetail = $this->commissionDetailRepository->where('articles_id', $articlesId)->first();
                $commission = $this->commissionRepository->find($commissionId);
                $indirectCommissionDefault = $commission->indirect_commission_default;
                $directCommissionDefault = $commission->direct_commission_default;
                $totalAmount = ($directCommissionDefault * $price) / 100;

                if ($commissionDetail) {
                    $commissionDetail->user_id = $userId;
                    $commissionDetail->save();
                } else {
                    if ($userId) {
                        // Nếu không có dữ liệu trong commission_detail, bạn có thể tạo mới ở đây
                        $this->commissionDetailRepository->create([
                            'user_id' => $userId,
                            'articles_id' => $articlesId,
                            'commission_id' => $commissionId,
                            'total_amount' => $totalAmount,
                            // Các trường dữ liệu khác nếu có
                        ]);

                    }
                }
            }

        }
    }

}
