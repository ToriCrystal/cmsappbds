<?php

namespace App\Api\V1\Http\Controllers\CustomerRegistrations;

use App\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Api\V1\Http\Requests\CustomerRegistrations\CustomerRegistrationsRequest;
use App\Api\V1\Http\Resources\CustomerRegistrations\{AllCustomerRegistrationsResource, ShowCustomerRegistrationsResource};
use App\Api\V1\Repositories\CustomerRegistrations\CustomerRegistrationsRepositoryInterface;
use App\Api\V1\Services\CustomerRegistrations\CustomerRegistrationsServiceInterface;
use App\Api\V1\Services\CustomerRegistrations\CustomerRegistrationsService;

/**
 * @group Quản lý đăng ký khách hàng
 */

class CustomerRegistrationsController extends Controller
{
    public function __construct(
        CustomerRegistrationsRepositoryInterface $repository,
        CustomerRegistrationsServiceInterface $service
    )
    {
        $this->repository = $repository;
        $this->service = $service;
    }
    /**
     * DS Quản lý đăng ký khách hàng
     *
     * Lấy danh sách CustomerRegistrations.
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Ví dụ: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @queryParam page integer
     * Trang hiện tại, page > 0. Ví dụ: 1
     * 
     * @queryParam limit integer
     * Số lượng CustomerRegistrations trong 1 trang, limit > 0. Ví dụ: 1
     * 
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Thực hiện thành công.",
     *      "data": [
     *         {
     *               "id": 4,
     *               "customer_id": "Thông tin của Customer_id",
     *               "article_id": "Thông tin của Article_id",
     *               "status": "Thông tin của Status",
     *               "registration_day": "Thông tin của Registration_day",
     *               "approval_day": "Thông tin của Approval_day"
     *         }
     *      ]
     * }
	 * @response 400 {
     *      "status": 400,
     *      "message": "Vui lòng kiểm tra lại các trường field"
     * }
	 * @response 500 {
     *      "status": 500,
     *      "message": "Thực hiện thất bại."
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(CustomerRegistrationsRequest $request){
		try {
			$data = $request->validated();
			$customerRegistrationss = $this->repository->paginate(...$data);
			$customerRegistrationss = new AllCustomerRegistrationsResource($customerRegistrationss);
			return response()->json([
				'status' => 200,
				'message' => __('Thực hiện thành công.'),
				'data' => $customerRegistrationss
			]);
		} catch (\Exception $e) {
			// Xử lý ngoại lệ nếu cần thiết
			return response()->json([
				'status' => 500,
				'message' => __('Thực hiện thất bại.')
			]);
		}
    }
    
    /**
     * Chi tiết Quản lý đăng ký khách hàng
     *
     * Lấy chi tiết CustomerRegistrations
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Ví dụ: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @pathParam id integer required
     * ID
     * 
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Thực hiện thành công.",
     *      "data": [
     *         {
     *               "id": 4,
     *               "customer_id": "Thông tin của Customer_id",
     *               "article_id": "Thông tin của Article_id",
     *               "status": "Thông tin của Status",
     *               "registration_day": "Thông tin của Registration_day",
     *               "approval_day": "Thông tin của Approval_day"
     *         }
     *      ]
     * }
	 * @response 500 {
     *      "status": 500,
     *      "message": "Thực hiện thất bại."
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($id){
		try {
			$customerRegistrations = $this->repository->findByID($id);
			$customerRegistrations = new ShowCustomerRegistrationsResource($customerRegistrations);
			return response()->json([
				'status' => 200,
				'message' => __('Thực hiện thành công.'),
				'data' => $customerRegistrations
			]);
		} catch (\Exception $e) {
			// Xử lý ngoại lệ nếu cần thiết
			return response()->json([
				'status' => 500,
				'message' => __('Thực hiện thất bại.')
			]);
		}
    }
	
	
	
	/**
     * Xóa CustomerRegistrations
     *
     * Xóa CustomerRegistrations một CustomerRegistrations theo ID
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Ví dụ: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @pathParam id integer required
     * id CustomerRegistrations. Ví dụ: 1
     * 
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Xóa thành công."
     * }
	 * @response 500 {
     *      "status": 500,
     *      "message": "Xóa thất bại."
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request){
        
		$id = $request->input('id');
		$response = $this->repository->delete($id);
        
		if($response){
            return response()->json([
				'status' => 200,
				'message' => __('Xóa thành công.')
			]);
        }
        return response()->json([
				'status' => 500,
				'message' => __('Xóa thất bại.')
		]);
    }
    
    /**
     * Thêm CustomerRegistrations
     *
     * Thêm một CustomerRegistrations mới
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Ví dụ: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @pathParam customer_id BIGINT(20) required
     * Mã khách hàng
     * @pathParam article_id BIGINT(20) required
     * Mã bài đăng
     * @pathParam status INT(11) required
     * Trạng thái
     * @pathParam registration_day DATETIME required
     * Ngày đăng ký
     * @pathParam approval_day DATETIME required
     * Ngày phê duyệt
     * 
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Thêm thành công."
     * }
	 * @response 500 {
     *      "status": 500,
     *      "message": "Thêm thất bại. Hãy kiểm tra lại."
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function add(CustomerRegistrationsRequest $request)
    {
        $response = $this->service->add($request);
        if($response){
            return response()->json([
                'status' => 200,
                'message' => __('Thêm thành công.')
            ]);
        }
        return response()->json([
            'status' => 500,
            'message' => __('Thêm thất bại. Hãy kiểm tra lại.')
        ], 500);
    }
	
	
	/**
     * Sửa CustomerRegistrations
     *
     * Sửa một CustomerRegistrations
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Ví dụ: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * 
     * @pathParam customer_id BIGINT(20) required
     * Mã khách hàng
     * @pathParam article_id BIGINT(20) required
     * Mã bài đăng
     * @pathParam status INT(11) required
     * Trạng thái
     * @pathParam registration_day DATETIME required
     * Ngày đăng ký
     * @pathParam approval_day DATETIME required
     * Ngày phê duyệt
     * 
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Sửa thành công."
     * }
	 * @response 500 {
     *      "status": 500,
     *      "message": "Sửa thất bại. Hãy kiểm tra lại."
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $response = $this->service->edit($request);
        if($response){
            return response()->json([
                'status' => 200,
                'message' => __('Sửa thành công.')
            ]);
        }
        return response()->json([
            'status' => 500,
            'message' => __('Sửa thất bại. Hãy kiểm tra lại.')
        ], 500);
    }
	
}