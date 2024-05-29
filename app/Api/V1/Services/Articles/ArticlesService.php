<?php

namespace App\Api\V1\Services\Articles;

use App\Api\V1\Services\Articles\ArticlesServiceInterface;
use App\Api\V1\Repositories\Articles\ArticlesRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Api\V1\Support\AuthSupport;
use App\Models\Articles;

class ArticlesService implements ArticlesServiceInterface
{
    use AuthSupport;
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;

    protected $repository;

    public function __construct(
        ArticlesRepositoryInterface $repository,
    ) {
        $this->repository = $repository;
    }

    public function add(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'user_id' => 'required',
            'admin_id' => 'nullable',
            'code' => 'nullable',
            'type' => 'nullable',
            'title' => 'required',
            'operative_management' => 'nullable',
            'slug' => 'nullable',
            'description' => 'nullable',
            'area' => 'required',
            'area_id' => 'required',
            'price' => 'required',
            'price_consent' => 'nullable',
            'quantity' => 'required',
            'height_floor' => 'nullable',
            'project_size' => 'required',
            'investor' => 'nullable',
            'constructor' => 'nullable',
            'hand_over' => 'nullable',
            'deployment_time' => 'nullable',
            'building_density' => 'nullable',
            'utilities' => 'nullable',
            'image' => 'required',
            'name_contact' => 'nullable',
            'phone_contact' => 'required',
            'status' => 'nullable',
            'active_days' => 'nullable',
            'time_start' => 'nullable',
            'district_id' => 'required',
            'houseType_id' => 'required',
            'ward_id' => 'required',
            'province_id' => 'required',
            'commission_id' => 'nullable'
            // Thêm các quy tắc validation khác nếu cần
        ]);

        // Tạo một bản ghi mới dựa trên dữ liệu từ request
        $newRecord = Articles::create($validatedData);

        // Trả về thông tin về bản ghi mới đã được tạo
        return 1;
    }

    public function edit(Request $request)
    {
        $requestData = $request->all();
        try {
            // Lấy ID của bản ghi cần cập nhật từ request hoặc từ các tham số khác
            $id = $requestData['id']; // Giả sử bạn gửi ID từ request
            // Tìm bản ghi cần cập nhật từ cơ sở dữ liệu
            $record = Articles::findOrFail($id);
            // Cập nhật các trường dữ liệu của bản ghi từ request
            $record->update($requestData);

            // Trả về thông báo thành công hoặc dữ liệu đã cập nhật
            return 1;
        } catch (\Exception $e) {
            // Xử lý ngoại lệ nếu cần thiết
            return 0;
        }
    }

    public function editActive(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'active_status' => 'nullable',
        ]);
        try {
            // Lấy ID của bản ghi cần cập nhật từ request hoặc từ các tham số khác
            $id = $validatedData['id']; // Giả sử bạn gửi ID từ request
            // Tìm bản ghi cần cập nhật từ cơ sở dữ liệu
            $record = Articles::findOrFail($id);
            // Cập nhật các trường dữ liệu của bản ghi từ request
            $record->update($validatedData);

            // Trả về thông báo thành công hoặc dữ liệu đã cập nhật
            return 1;
        } catch (\Exception $e) {
            // Xử lý ngoại lệ nếu cần thiết
            return 0;
        }
    }

    public function editArticle(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'article_status' => 'nullable',
        ]);
        try {
            // Lấy ID của bản ghi cần cập nhật từ request hoặc từ các tham số khác
            $id = $validatedData['id']; // Giả sử bạn gửi ID từ request
            // Tìm bản ghi cần cập nhật từ cơ sở dữ liệu
            $record = Articles::findOrFail($id);
            // Cập nhật các trường dữ liệu của bản ghi từ request
            $record->update($validatedData);

            // Trả về thông báo thành công hoặc dữ liệu đã cập nhật
            return 1;
        } catch (\Exception $e) {
            // Xử lý ngoại lệ nếu cần thiết
            return 0;
        }
    }
}
