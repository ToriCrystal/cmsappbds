<?php

namespace App\Api\V1\Http\Controllers\Articles;

use App\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Api\V1\Http\Requests\Articles\ArticlesRequest;
use App\Api\V1\Http\Resources\Articles\{AllArticlesResource, ShowArticlesResource};
use App\Api\V1\Repositories\Articles\ArticlesRepositoryInterface;
use App\Api\V1\Services\Articles\ArticlesServiceInterface;

/**
 * @group Bài đăng
 */

class ArticlesController extends Controller
{
    public function __construct(
        ArticlesRepositoryInterface $repository,
        ArticlesServiceInterface $service
    ) {
        $this->repository = $repository;
        $this->service = $service;
    }
    /**
     * DS Bài đăng
     *
     * Lấy danh sách bài đăng.
     * 
     * @authenticated Authorization string required 
     * access_token được cấp sau khi đăng nhập. Example: Bearer 1|WhUre3Td7hThZ8sNhivpt7YYSxJBWk17rdndVO8K
     * 
     * @queryParam page integer
     * Trang hiện tại, page > 0. Ví dụ: 1
     * 
     * @queryParam limit integer
     * Số lượng bài đăng trong 1 trang, limit > 0. Ví dụ: 1
     * 
     * 
     * @response 200 {
     *      "status": 200,
     *      "message": "Thực hiện thành công.",
     *      "data": [
     *         {
     *               "id": 4,
     *               "user_id": "Thông tin của User_id",
     *               "admin_id": "Thông tin của Admin_id",
     *               "code": "Thông tin của Code",
     *               "type": "Thông tin của Type",
     *               "title": "Thông tin của Title",
     *               "slug": "Thông tin của Slug",
     *               "description": "Thông tin của Description",
     *               "area": "Thông tin của Area",
     *               "price": "Thông tin của Price",
     *               "price_consent": "Thông tin của Price_consent",
     *               "quantity": "Thông tin của Quantity",
     *               "height_floor": "Thông tin của Height_floor",
     *               "project_size": "Thông tin của Project_size",
     *               "investor": "Thông tin của Investor",
     *               "constructor": "Thông tin của Constructor",
     *               "hand_over": "Thông tin của Hand_over",
     *               "deployment_time": "Thông tin của Deployment_time",
     *               "building_density": "Thông tin của Building_density",
     *               "utilities": "Thông tin của Utilities",
     *               "active_status": "Thông tin của active_status",
     *               "image": "Thông tin của Image",
     *               "name_contact": "Thông tin của Name_contact",
     *               "phone_contact": "Thông tin của Phone_contact",
     *               "status": "Thông tin của Status",
     *               "active_days": "Thông tin của Active_days",
     *               "time_start": "Thông tin của Time_start",
     *               "district_id": "Thông tin của District_id",
     *               "ward_id": "Thông tin của Ward_id",
     *               "province_id": "Thông tin của Province_id"
     *               "area_id": "Thông tin của Area_id",
     *               "houseType_id": "Thông tin của houseType_id",
     *               "broker_id": "Thông tin của broker",
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
    public function index(ArticlesRequest $request)
    {
        try {
            $data = $request->validated();
            $articless = $this->repository->paginate(...$data);
            $articless = new AllArticlesResource($articless);
            return response()->json([
                'status' => 200,
                'message' => __('Thực hiện thành công.'),
                'data' => $articless
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
     * Chi tiết Bài đăng
     *
     * Lấy chi tiết bài đăng
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
     *               "user_id": "Thông tin của User_id",
     *               "admin_id": "Thông tin của Admin_id",
     *               "code": "Thông tin của Code",
     *               "type": "Thông tin của Type",
     *               "title": "Thông tin của Title",
     *               "slug": "Thông tin của Slug",
     *               "description": "Thông tin của Description",
     *               "area": "Thông tin của Area",
     *               "price": "Thông tin của Price",
     *               "price_consent": "Thông tin của Price_consent",
     *               "quantity": "Thông tin của Quantity",
     *               "height_floor": "Thông tin của Height_floor",
     *               "project_size": "Thông tin của Project_size",
     *               "investor": "Thông tin của Investor",
     *               "constructor": "Thông tin của Constructor",
     *               "active_status": "Thông tin của active_status",
     *               "hand_over": "Thông tin của Hand_over",
     *               "deployment_time": "Thông tin của Deployment_time",
     *               "building_density": "Thông tin của Building_density",
     *               "utilities": "Thông tin của Utilities",
     *               "image": "Thông tin của Image",
     *               "name_contact": "Thông tin của Name_contact",
     *               "phone_contact": "Thông tin của Phone_contact",
     *               "status": "Thông tin của Status",
     *               "active_days": "Thông tin của Active_days",
     *               "time_start": "Thông tin của Time_start",
     *               "district_id": "Thông tin của District_id",
     *               "ward_id": "Thông tin của Ward_id",
     *               "province_id": "Thông tin của Province_id"
     *               "broker_id": "Thông tin của broker",
     * 
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
    public function show($id)
    {
        try {
            $articles = $this->repository->findByID($id);
            $articles = new ShowArticlesResource($articles);
            return response()->json([
                'status' => 200,
                'message' => __('Thực hiện thành công.'),
                'data' => $articles
            ]);
        } catch (\Exception $e) {
            // Xử lý ngoại lệ nếu cần thiết
            return response()->json([
                'status' => 500,
                'message' => __('Thực hiện thất bại.')
            ]);
        }
    }



    // /**
    //  * Xóa Articles
    //  *
    //  * Xóa Articles một Articles theo ID
    //  *
    //  * @headersParam X-TOKEN-ACCESS string
    //  * token để lấy dữ liệu. Ví dụ: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
    //  * 
    //  * @queryParam id integer required
    //  * id Articles. Ví dụ: 1
    //  * 
    //  * 
    //  * @response 200 {
    //  *      "status": 200,
    //  *      "message": "Xóa thành công."
    //  * }
    //  * @response 500 {
    //  *      "status": 500,
    //  *      "message": "Xóa thất bại."
    //  * }
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * 
    //  * @return \Illuminate\Http\Response
    //  */
    // public function delete(Request $request)
    // {
    //     $id = $request->input('id');
    //     $response = $this->repository->delete($id);

    //     if ($response) {
    //         return response()->json([
    //             'status' => 200,
    //             'message' => __('Xóa thành công.')
    //         ]);
    //     }
    //     return response()->json([
    //         'status' => 500,
    //         'message' => __('Xóa thất bại.')
    //     ]);
    // }

    /**
     * Thêm Bài đăng
     *
     * Thêm một Bài đăng mới
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Ví dụ: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @pathParam user_id BIGINT(20) required
     * Mã người dùng
     * @pathParam admin_id BIGINT(20) 
     * Mã quản lý
     * @pathParam code VARCHAR(191) 
     * Code
     * @pathParam type INT(11) 
     * Loại
     * @pathParam title VARCHAR(191) required
     * Tiêu đề
     * @pathParam slug TEXT 
     * slug
     * @pathParam description LONGTEXT 
     * Mô tả
     * @pathParam area VARCHAR(191)  required
     * Diện tích
     * @pathParam price INT(11) required
     * Giá tiền
     * @pathParam price_consent TINYINT(1) 
     * Giá thương lượng
     * @pathParam quantity INT(11) required
     * Số lượng
     * @pathParam height_floor BIGINT(20) 
     * Chiều cao tầng
     * @pathParam project_size BIGINT(20) required
     * Diện tích dự án
     * @pathParam investor VARCHAR(191) 
     * Nhà đầu tư
     * @pathParam constructor VARCHAR(191) 
     * Người xây dựng
     * @pathParam hand_over VARCHAR(191) 
     * Bàn giao
     * @pathParam deployment_time DATETIME 
     * Thời gian triển khai
     * @pathParam building_density BIGINT(20) 
     * Mật độ toà nhà
     * @pathParam utilities TEXT 
     * Tiện ích
     * @pathParam image LONGTEXT required
     * Hình ảnh 
     * @pathParam name_contact VARCHAR(191) 
     * Người liên hệ
     * @pathParam phone_contact VARCHAR(191) required
     * Số điện thoại liên hệ
     * @pathParam status INT(11) 
     * Trạng thái
     * @pathParam active_days INT(11) 
     * Ngày hoạt động
     * @pathParam time_start DATETIME 
     * Thời gian bắt đầu
     * @pathParam district_id BIGINT(20) required
     * Quận
     * @pathParam ward_id BIGINT(20) required
     * Phường
     * @pathParam province_id BIGINT(20) required
     * Tỉnh
     * @pathParam area_id BIGINT(20) required
     * Khu vực bài đăng
     * @pathParam houseType_id LONGTEXT required
     * Loại hình nhà
     * @pathParam operative_management VARCHAR(191) 
     * Quản lý điều hành
     * @pathParam article_status INT(11) required
     * Trạng thái bài đăng
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
    public function add(ArticlesRequest $request)
    {
        $response = $this->service->add($request);
        if ($response) {
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
     * Sửa Bài đăng
     *
     * Sửa một Bài đăng
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Ví dụ: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @pathParam id BIGINT(20) required
     * Id
     * @pathParam user_id BIGINT(20) required
     * Mã người dùng
     * @pathParam admin_id BIGINT(20) 
     * Mã quản lý
     * @pathParam code VARCHAR(191) 
     * Code
     * @pathParam type INT(11) 
     * Loại
     * @pathParam title VARCHAR(191) required
     * Tiêu đề
     * @pathParam slug TEXT 
     * slug
     * @pathParam description LONGTEXT 
     * Mô tả
     * @pathParam area VARCHAR(191) required
     * Diện tích
     * @pathParam price INT(11) required
     * Giá tiền
     * @pathParam price_consent TINYINT(1) 
     * Giá thương lượng
     * @pathParam quantity INT(11) required
     * Số lượng
     * @pathParam height_floor BIGINT(20) 
     * Chiều cao tầng
     * @pathParam project_size BIGINT(20) required
     * Diện tích dự án
     * @pathParam investor VARCHAR(191) 
     * Nhà đầu tư
     * @pathParam constructor VARCHAR(191) 
     * Người xây dựng
     * @pathParam hand_over VARCHAR(191) 
     * Bàn giao
     * @pathParam deployment_time DATETIME 
     * Thời gian triển khai
     * @pathParam building_density BIGINT(20) 
     * Mật độ toà nhà
     * @pathParam utilities TEXT 
     * Tiện ích
     * @pathParam image LONGTEXT required
     * Hình ảnh 
     * @pathParam name_contact VARCHAR(191) 
     * Người liên hệ
     * @pathParam phone_contact VARCHAR(191) required
     * Số điện thoại liên hệ
     * @pathParam status INT(11) 
     * Trạng thái
     * @pathParam active_status INT(11) 
     * Trạng thái
     * @pathParam active_days INT(11) 
     * Ngày hoạt động
     * @pathParam time_start DATETIME 
     * Thời gian bắt đầu
     * @pathParam district_id BIGINT(20) required
     * Quận
     * @pathParam ward_id BIGINT(20) required
     * Phường
     * @pathParam province_id BIGINT(20) required
     * Tỉnh
     * @pathParam area_id BIGINT(20) required
     * Khu vực bài đăngx
     * @pathParam houseType_id  LONGTEXT required
     * Loại hình nhà
     * @pathParam operative_management VARCHAR(191) 
     * Quản lý điều hành
     * @pathParam article_status INT(11) required
     * Trạng thái bài đăng
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
        if ($response) {
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

    /**
     * Sửa Trạng thái hoạt động Bài đăng
     *
     * Sửa trạng thái hoạt động Bài đăng
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Ví dụ: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @pathParam id BIGINT(20) required
     * Id
     * @pathParam active_status INT(11) 
     * Trạng thái hoạt động
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
    public function editActiveStatus(Request $request)
    {
        $response = $this->service->edit($request);
        if ($response) {
            return response()->json([
                'status' => 200,
                'message' => __('Đổi trạng thái thành công.')
            ]);
        }
        return response()->json([
            'status' => 500,
            'message' => __('Đổi trạng thái thất bại. Hãy kiểm tra lại.')
        ], 500);
    }

    /**
     * Sửa Trạng thái Bài đăng
     *
     * Sửa trạng thái Bài đăng
     *
     * @headersParam X-TOKEN-ACCESS string
     * token để lấy dữ liệu. Ví dụ: ijCCtggxLEkG3Yg8hNKZJvMM4EA1Rw4VjVvyIOb7
     * 
     * @pathParam id BIGINT(20) required
     * Id
     * @pathParam article_status INT(11) 
     * Trạng thái bài đăng
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
    public function editArticleStatus(Request $request)
    {
        $response = $this->service->edit($request);
        if ($response) {
            return response()->json([
                'status' => 200,
                'message' => __('Đổi trạng thái thành công.')
            ]);
        }
        return response()->json([
            'status' => 500,
            'message' => __('Đổi trạng thái thất bại nè. Hãy kiểm tra lại.')
        ], 500);
    }
}
