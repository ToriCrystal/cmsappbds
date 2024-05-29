<?php

namespace App\Models;

use App\Enums\Customer\CustomerStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = "customers";

    protected $guarded = [];

    protected $casts = [
        'status' => CustomerStatus::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'broker_id');
    }
    public function customerRegistrations()
    {
        return $this->hasMany(CustomerRegistrations::class, 'customer_id');
    }
}
