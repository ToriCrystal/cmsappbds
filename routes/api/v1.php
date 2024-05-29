<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/






// //post category
// Route::controller(App\Api\V1\Http\Controllers\PostCategory\PostCategoryController::class)
//     ->prefix('/posts-categories')
//     ->as('post_catogery.')
//     ->group(function () {
//         Route::get('/', 'index')->name('index');
//         Route::get('/show/{id}', 'show')->name('show');
//     });

// //posts
// Route::controller(App\Api\V1\Http\Controllers\Post\PostController::class)
//     ->prefix('/posts')
//     ->as('post.')
//     ->group(function () {
//         Route::get('/', 'index')->name('index');
//         Route::get('/featured', 'featured')->name('featured');
//         Route::get('/show/{id}', 'show')->name('show');
//         Route::get('/related/{id}', 'related')->name('related');
//     });
// //review product
// Route::controller(App\Api\V1\Http\Controllers\Review\ReviewController::class)
//     ->prefix('/reviews')
//     ->as('review.')
//     ->group(function () {
//         Route::get('/', 'index')->name('index');
//         Route::post('/store', 'store')->name('store')->middleware('auth:sanctum');
//     });

Route::middleware('auth:sanctum')->group(function () {
    // //order
    // Route::controller(App\Api\V1\Http\Controllers\Order\OrderController::class)
    //     ->prefix('/order')
    //     ->as('order.')
    //     ->group(function () {
    //         Route::get('/', 'index')->name('index');
    //         Route::post('/store', 'store')->name('store');
    //         Route::put('/cancel', 'cancel')->name('cancel');
    //         Route::get('/show/{id}', 'show')->name('show');
    //         Route::delete('/delete/{id}', 'delete')->name('delete');
    //     });
    // //shopping cart
    // Route::controller(App\Api\V1\Http\Controllers\ShoppingCart\ShoppingCartController::class)
    //     ->prefix('/shopping-cart')
    //     ->as('shopping_cart.')
    //     ->group(function () {
    //         Route::get('/', 'index')->name('index');
    //         Route::post('/store', 'store')->name('store');
    //         Route::put('/update', 'update')->name('update');
    //         Route::delete('/delete', 'delete')->name('delete');
    //     });
    //***** -- Commission -- ******* //
    Route::controller(App\Api\V1\Http\Controllers\Commission\CommissionController::class)
        ->prefix('/commissions')
        ->as('commission.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}', 'show')->name('show');
            Route::delete('/delete', 'delete')->name('delete');
            Route::post('/add', 'add')->name('add');
            Route::put('/edit', 'edit')->name('edit');
        });
    //***** -- Commission -- ******* //
    //***** -- Articles -- ******* //
    Route::controller(App\Api\V1\Http\Controllers\Articles\ArticlesController::class)
        ->prefix('/articless')
        ->as('articles.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/add', 'add')->name('add');
            Route::put('/edit', 'edit')->name('edit');
            Route::put('/edit-status', 'editActiveStatus')->name('editActiveStatus');
            Route::put('/edit-article', 'editArticleStatus')->name('editArticleStatus');
        });
    //***** -- Articles -- ******* //
    //***** -- Areas -- ******* //
    Route::controller(App\Api\V1\Http\Controllers\HouseType\HouseTypeController::class)
        ->prefix('/house-typess')
        ->as('house-types.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}', 'show')->name('show');
        });
    //***** -- Areas -- ******* //
    //***** -- Areas -- ******* //
    Route::controller(App\Api\V1\Http\Controllers\Area\AreaController::class)
        ->prefix('/areass')
        ->as('areas.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}', 'show')->name('show');
        });
    //***** -- Areas -- ******* //
    //***** -- Customers -- ******* //
    Route::controller(App\Api\V1\Http\Controllers\Customers\CustomersController::class)
        ->prefix('/customerss')
        ->as('customers.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}', 'show')->name('show');
            Route::delete('/delete', 'delete')->name('delete');
            Route::post('/add', 'add')->name('add');
            Route::put('/edit', 'edit')->name('edit');
        });
    //***** -- Customers -- ******* //

    //***** -- CustomerRegistrations -- ******* //
    Route::controller(App\Api\V1\Http\Controllers\CustomerRegistrations\CustomerRegistrationsController::class)
        ->prefix('/customerRegistrationss')
        ->as('customerRegistrations.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}', 'show')->name('show');
            Route::delete('/delete', 'delete')->name('delete');
            Route::post('/add', 'add')->name('add');
            Route::put('/edit', 'edit')->name('edit');
        });
    //***** -- CustomerRegistrations -- ******* //

    //***** -- Setting -- ******* //
     Route::controller(App\Api\V1\Http\Controllers\Setting\SettingController::class)
         ->prefix('/settings')
         ->as('setting.')
         ->group(function () {
             Route::get('/', 'index')->name('index');
         });
    // //***** -- Setting -- ******* //

    //***** -- Notification -- ******* //
    Route::controller(App\Api\V1\Http\Controllers\Notification\NotificationController::class)
        ->prefix('/notifications')
        ->as('notification.')
        ->group(function () {
            Route::middleware('auth:sanctum')->prefix('/notifications')->as('notification.')->group(function () {
                Route::put('/update-device-token', 'updateDeviceToken')->name('updateToken');
            });
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}', 'show')->name('show');
            Route::delete('/delete', 'delete')->name('delete');
            Route::post('/add', 'add')->name('add');
            Route::put('/edit', 'edit')->name('edit');
        });
    //***** -- Notification -- ******* //

    // //***** -- Contact_admin -- ******* //
    // Route::controller(App\Api\V1\Http\Controllers\Contact_admin\Contact_adminController::class)
    //     ->prefix('/contact_admins')
    //     ->as('contact_admin.')
    //     ->group(function () {
    //         Route::get('/', 'index')->name('index');
    //         Route::get('/show/{id}', 'show')->name('show');
    //         Route::delete('/delete', 'delete')->name('delete');
    //         Route::post('/add', 'add')->name('add');
    //         Route::put('/edit', 'edit')->name('edit');
    //     });
    // //***** -- Contact_admin -- ******* //


    //***** -- Commission_detail -- ******* //
    Route::controller(App\Api\V1\Http\Controllers\Commission\CommissionDetailController::class)
        ->prefix('/commission_details')
        ->as('commission_detail.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}', 'show')->name('show');
            Route::delete('/delete', 'delete')->name('delete');
            Route::post('/add', 'add')->name('add');
            Route::put('/edit', 'edit')->name('edit');
        });
    //***** -- Commission_detail -- ******* //
});

// Route::prefix('/category')
//     ->as('category.')
//     ->group(function () {
//         Route::controller(App\Api\V1\Http\Controllers\Category\CategoryController::class)
//             ->group(function () {
//                 Route::get('/', 'index')->name('index');
//                 Route::get('/product', 'product')->name('product');
//                 Route::get('/show/{id}', 'show')->name('show');
//             });
//         Route::middleware('auth:sanctum')
//             ->controller(App\Api\V1\Http\Controllers\Category\CategoryAuthController::class)
//             ->prefix('/auth')
//             ->as('auth.')
//             ->group(function () {
//                 Route::get('/product', 'product')->name('product');
//                 Route::get('/show/{id}', 'show')->name('show');
//             });
//     });


// Route::prefix('/product')
//     ->as('product.')
//     ->group(function () {
//         Route::controller(App\Api\V1\Http\Controllers\Product\ProductController::class)
//             ->group(function () {
//                 Route::get('/', 'index')->name('index');
//                 Route::get('/show/{id}', 'show')->name('show');
//             });
//         Route::controller(App\Api\V1\Http\Controllers\Product\ProductVariationController::class)
//             ->prefix('/variation')
//             ->as('variation.')
//             ->group(function () {
//                 Route::get('/show', 'show')->name('show');
//             });

//         Route::middleware('auth:sanctum')
//             ->prefix('/auth')
//             ->as('auth.')
//             ->group(function () {
//                 Route::controller(App\Api\V1\Http\Controllers\Product\ProductAuthController::class)->group(function () {
//                     Route::get('/', 'index')->name('index');
//                     Route::get('/show/{id}', 'show')->name('show');
//                 });
//                 Route::controller(App\Api\V1\Http\Controllers\Product\ProductAuthVariationController::class)
//                     ->prefix('/variation')
//                     ->as('variation.')
//                     ->group(function () {
//                         Route::get('/show', 'show')->name('show');
//                     });
//             });
//     });

// //slider
// Route::controller(App\Api\V1\Http\Controllers\Slider\SliderController::class)
//     ->prefix('/slider')
//     ->as('slider.')
//     ->group(function () {
//         Route::get('/show/{key}', 'show')->name('show');
//     });

// //auth
Route::controller(App\Api\V1\Http\Controllers\Auth\AuthController::class)
    ->group(function () {
        Route::middleware('auth:sanctum')->prefix('/auth')->as('auth.')->group(function () {
            Route::get('/', 'show')->name('show');
            Route::put('/', 'update')->name('update');
            Route::put('/update-password', 'updatePassword')->name('update_password');
        });
        Route::post('/register', 'register')->name('register');
        Route::post('/login', 'login')->name('login');
    });

Route::controller(App\Api\V1\Http\Controllers\Auth\ResetPasswordController::class)
    ->prefix('/reset-password')
    ->as('reset_password.')
    ->group(function () {
        Route::post('/', 'checkAndSendMail')->name('check_and_send_mail');
    });

Route::fallback(function () {
    return response()->json([
        'status' => 404,
        'message' => __('Không tìm thấy đường dẫn.')
    ], 404);
});
