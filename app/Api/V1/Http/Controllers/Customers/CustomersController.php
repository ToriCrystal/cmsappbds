<?php

namespace App\Api\V1\Http\Controllers\Customers;

use App\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Api\V1\Http\Requests\Customers\CustomersRequest;
use App\Api\V1\Http\Resources\Customers\{AllCustomersResource, ShowCustomersResource};
use App\Api\V1\Repositories\Customers\CustomersRepositoryInterface;
use App\Api\V1\Services\Customers\CustomersServiceInterface;
use App\Api\V1\Services\Customers\CustomersService;

/**
 * @group Bảng khách hàng
 */

class CustomersController extends Controller
{
    public function __construct(
        CustomersRepositoryInterface $repository,
        CustomersServiceInterface $service
    )
    {
        $this->repository = $repository;
        $this->service = $service;
    }
    /**
     * DS Bảng khách hàng
     *
     * Lấy danh sách Customers.
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Ví dụ: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @queryParam page integer
     * Trang hiện tại, page > 0. Ví dụ: 1
     * 
     * @queryParam limit integer
     * Số lượng Customers trong 1 trang, limit > 0. Ví dụ: 1
     * 
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Thực hiện thành công.",
     *      "data": [
     *         {
     *               "id": 4,
     *               "broker_id": "Thông tin của Broker_id",
     *               "customer_name": "Thông tin của Customer_name",
     *               "phone": "Thông tin của Phone",
     *               "refferal_code": "Thông tin của Refferal_code",
     *               "needs": "Thông tin của Needs",
     *               "status": "Thông tin của Status"
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
    public function index(CustomersRequest $request){
		try {
			$data = $request->validated();
			$customerss = $this->repository->paginate(...$data);
			$customerss = new AllCustomersResource($customerss);
			return response()->json([
				'status' => 200,
				'message' => __('Thực hiện thành công.'),
				'data' => $customerss
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
     * Chi tiết Bảng khách hàng
     *
     * Lấy chi tiết Customers
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
     *               "broker_id": "Thông tin của Broker_id",
     *               "customer_name": "Thông tin của Customer_name",
     *               "phone": "Thông tin của Phone",
     *               "refferal_code": "Thông tin của Refferal_code",
     *               "needs": "Thông tin của Needs",
     *               "status": "Thông tin của Status"
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
			$customers = $this->repository->findByID($id);
			$customers = new ShowCustomersResource($customers);
			return response()->json([
				'status' => 200,
				'message' => __('Thực hiện thành công.'),
				'data' => $customers
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
     * Xóa Customers
     *
     * Xóa Customers một Customers theo ID
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Ví dụ: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @pathParam id integer required
     * id Customers. Ví dụ: 1
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
     * Thêm Customers
     *
     * Thêm một Customers mới
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Ví dụ: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @pathParam broker_id BIGINT(20) required
     * Mã môi giới
     * @pathParam customer_name VARCHAR(191) required
     * Tên khách hàng
     * @pathParam phone VARCHAR(10) 
     * Điện thoại
     * @pathParam refferal_code VARCHAR(191) 
     * Mã giới thiệu
     * @pathParam needs TEXT 
     * Nhu cầu
     * @pathParam status BIGINT(20) 
     * Trạng thái
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
    public function add(CustomersRequest $request)
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
     * Sửa Customers
     *
     * Sửa một Customers
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Ví dụ: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * 
     * @pathParam broker_id BIGINT(20) required
     * Mã môi giới
     * @pathParam customer_name VARCHAR(191) required
     * Tên khách hàng
     * @pathParam phone VARCHAR(10) 
     * Điện thoại
     * @pathParam refferal_code VARCHAR(191) 
     * Mã giới thiệu
     * @pathParam needs TEXT 
     * Nhu cầu
     * @pathParam status BIGINT(20) 
     * Trạng thái
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