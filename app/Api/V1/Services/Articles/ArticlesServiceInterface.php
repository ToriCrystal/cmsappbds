<?php

namespace App\Api\V1\Services\Articles;

use Illuminate\Http\Request;

interface ArticlesServiceInterface
{
    /**
     * Tạo mới
     * 
     * @var Illuminate\Http\Request $request
     * 
     * @return mixed
     */
    public function add(Request $request);

    /**
     * Sửa
     * 
     * @var Illuminate\Http\Request $request
     * 
     * @return mixed
     */
    public function edit(Request $request);


    /**
     * Sửa Trạng Thái hoạt động
     * 
     * @var Illuminate\Http\Request $request
     * 
     * @return mixed
     */
    public function editActive(Request $request);

       /**
     * Sửa Trạng Thái bài đăng
     * 
     * @var Illuminate\Http\Request $request
     * 
     * @return mixed
     */
    public function editArticle(Request $request);
}
