<?php

namespace App\Models;

use Illuminate\Console\View\Components\Warn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use App\Admin\Support\Eloquent\Sluggable;

class Articles extends Model
{
    use HasFactory, Sluggable;

    protected $table = "articles";
    protected $columnSlug = 'title';

    protected $guarded = [];

    protected $casts = [
        'image' => AsArrayObject::class,
        'broker_id' => AsArrayObject::class,
        'houseType_id' => AsArrayObject::class,
    ];

    public function customerRegistrations()
    {
        return $this->hasMany(CustomerRegistrations::class, 'article_id');
    }

    public function articleAdmin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function articleUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function articleProvince()
    {
        return $this->belongsTo(Province::class, 'province_id', 'code');
    }

    public function articleDistrict()
    {
        return $this->belongsTo(District::class, 'district_id', 'code');
    }

    public function articleWard()
    {
        return $this->belongsTo(Wards::class, 'ward_id', 'code');
    }

    public function articleArea()
    {
        return $this->belongsTo(Areas::class, 'area_id', 'id');
    }

    public function articleHouseType()
    {
        return $this->belongsTo(HouseType::class, 'houseType_id', 'id');
    }

    public function commission_detail()
    {
        return $this->belongsTo(CommissionDetail::class, 'article_id');
    }

    public function categories()
    {
        return $this->belongsToMany(ArticlesHouseTypes::class, 'articles_house_types', 'article_id', 'houseType_id');
    }
}
