<?php

use App\Enums\Customer\CustomerStatus;
use App\Enums\Notification\NotificationEnum;
use App\Enums\CustomerRegistration\CustomerRegistrationStatus;
use App\Enums\Order\OrderStatus;
use App\Enums\PostCategory\PostCategoryStatus;
use App\Enums\Post\PostStatus;
use App\Enums\Module\ModuleStatus;
use App\Enums\Product\{ProductType, ProductVariationAction};
use App\Enums\Setting\SettingGroup;
use App\Enums\Slider\SliderStatus;
use App\Enums\User\{UserGender, UserVip, UserRoles};
use App\Enums\Article\{ArticlePriceConsent, ArticleActiveStatus, ArticleStatus, ArticleType, ArticleArticleStatus};
use App\Enums\CommissionDetail\CommissionDetailStatus;

return [
    NotificationEnum::class => [
        NotificationEnum::NotSeen => 'Chưa xem',
        NotificationEnum::Seen => 'Đã xem'
    ],
    UserGender::class => [
        UserGender::Male => 'Nam',
        UserGender::Female => 'Nữ',
        UserGender::Other => 'Khác',
    ],
    UserVip::class => [
        UserVip::Default => 'Mặc định',
        UserVip::Bronze => 'Đồng',
        UserVip::Silver => 'Bạc',
        UserVip::Gold => 'Vàng',
        UserVip::Diamond => 'Kim cương',
    ],
    UserRoles::class => [
        UserRoles::Seller => 'Bán hàng',
        UserRoles::Broker => 'Môi giới',

    ],
    CustomerStatus::class => [
        CustomerStatus::Called => 'Đã gọi',
        CustomerStatus::Unhandled => 'Chưa xử lý',
        CustomerStatus::Recontact => 'Tái liên hệ',
    ],
    CustomerRegistrationStatus::class => [
        CustomerRegistrationStatus::Waiting => 'Chờ duyệt',
        CustomerRegistrationStatus::Approved => 'Đã duyệt',
        CustomerRegistrationStatus::Rejected => 'Không duyệt',
    ],
    ProductType::class => [
        ProductType::Simple => 'Sản phẩm đơn giản',
        ProductType::Variable => 'Sản phẩm có biến thể'
    ],
    ProductVariationAction::class => [
        ProductVariationAction::AddSimple => 'Thêm biến thể',
        ProductVariationAction::AddFromAllVariations => 'Tạo biến thể từ tất cả thuộc tính'
    ],
    OrderStatus::class => [
        OrderStatus::Processing => 'Đang xử lý',
        OrderStatus::Processed => 'Đã xử lý',
        OrderStatus::Completed => 'Đã hoàn thành',
        OrderStatus::Cancelled => 'Đã hủy'
    ],
    SliderStatus::class => [
        SliderStatus::Active => 'Hoạt động',
        SliderStatus::Inactive => 'Ngưng hoạt động'
    ],
    SettingGroup::class => [
        SettingGroup::General => 'Chung',
        SettingGroup::Account => 'Thông tin tài khoản',
        SettingGroup::Commission => 'Thông tin hoa hồng',
        //        SettingGroup::UserDiscount => 'Chiếc khấu mua hàng theo cấp TV',
        SettingGroup::UserUpgrade => 'SL SP nâng cấp TV',
    ],
    PostCategoryStatus::class => [
        PostCategoryStatus::Published => 'Đã xuất bản',
        PostCategoryStatus::Draft => 'Bản nháp'
    ],
    PostStatus::class => [
        PostStatus::Published => 'Đã xuất bản',
        PostStatus::Draft => 'Bản nháp'
    ],
    ModuleStatus::class => [
        ModuleStatus::ChuaXong => 'Chưa xong',
        ModuleStatus::DaXong => 'Đã xong',
        ModuleStatus::DaDuyet => 'Đã duyệt'
    ],
    CommissionDetailStatus::class => [
        CommissionDetailStatus::Waiting => 'Chờ duyệt',
        CommissionDetailStatus::Approved => 'Đã duyệt',
        CommissionDetailStatus::Rejected => 'Không duyệt',
    ],
    ArticleActiveStatus::class => [
        ArticleActiveStatus::Published => 'Hiện',
        ArticleActiveStatus::Draft => 'Nháp',
    ],
    ArticlePriceConsent::class => [
        ArticlePriceConsent::Yes => 'Có',
        ArticlePriceConsent::No => 'Không',
    ],
    ArticleStatus::class => [
        ArticleStatus::Vip => 'Vip',
        ArticleStatus::Normal => 'Thường',
    ],
    ArticleType::class => [
        ArticleType::Rent => 'Thuê',
        ArticleType::Sell => 'Bán',
    ],
    ArticleArticleStatus::class => [
        ArticleArticleStatus::Waiting => 'Chờ duyệt',
        ArticleArticleStatus::Approved => 'Đã duyệt',
        ArticleArticleStatus::Cancel => 'Không duyệt',
    ],
];
