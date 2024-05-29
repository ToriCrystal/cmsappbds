<?php

namespace App\Models;

use App\Enums\CustomerRegistration\CustomerRegistrationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerRegistrations extends Model
{
    use HasFactory;

    protected $table = "customerregistrations";

    protected $guarded = [];

    protected $casts = [
        'status' => CustomerRegistrationStatus::class
    ];

    public function articles()
    {
        return $this->belongsTo(Articles::class, 'article_id');
    }
    public function customers()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }
    public function commission_detail()
    {
        return $this->belongsTo(CommissionDetail::class, 'article_id');
    }

}
