<?php

namespace App\Api\V1\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    protected $services = [
        'App\Api\V1\Services\Customers\CustomersServiceInterface' => 'App\Api\V1\Services\Customers\CustomersService',
        'App\Api\V1\Services\CustomerRegistrations\CustomerRegistrationsServiceInterface' => 'App\Api\V1\Services\CustomerRegistrations\CustomerRegistrationsService',
        'App\Api\V1\Services\SupperAdmin_settings\SupperAdmin_settingsServiceInterface' => 'App\Api\V1\Services\SupperAdmin_settings\SupperAdmin_settingsService',
        'App\Api\V1\Services\Notification\NotificationServiceInterface' => 'App\Api\V1\Services\Notification\NotificationService',
        'App\Api\V1\Services\Contact_admin\Contact_adminServiceInterface' => 'App\Api\V1\Services\Contact_admin\Contact_adminService',
        'App\Api\V1\Services\Articles\ArticlesServiceInterface' => 'App\Api\V1\Services\Articles\ArticlesService',
        'App\Api\V1\Services\Commission\CommissionServiceInterface' => 'App\Api\V1\Services\Commission\CommissionService',
        'App\Api\V1\Services\CommissionDetail\CommissionDetailServiceInterface' => 'App\Api\V1\Services\CommissionDetail\CommissionDetailService',
        
        'App\Api\V1\Services\User\UserServiceInterface' => 'App\Api\V1\Services\User\UserService',
        'App\Api\V1\Services\Auth\AuthServiceInterface' => 'App\Api\V1\Services\Auth\AuthService',
        'App\Api\V1\Services\ShoppingCart\ShoppingCartServiceInterface' => 'App\Api\V1\Services\ShoppingCart\ShoppingCartService',
        'App\Api\V1\Services\Order\OrderServiceInterface' => 'App\Api\V1\Services\Order\OrderService',
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach ($this->services as $interface => $implement) {
            $this->app->singleton($interface, $implement);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
