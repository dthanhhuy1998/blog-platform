<?php

use Illuminate\Support\Facades\Route;

// ================ Controller Class ================ //
use App\Http\Controllers\TestController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductGroupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\GuaranteeController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\EntrypointController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DistributionSystemController;
use App\Http\Controllers\Pages\FrontEndController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Pages\PageCategoryController;
use App\Http\Controllers\Pages\PageProductController;
use App\Http\Controllers\Client\VoucherController as ClientVoucherController;

// ================ Catalog Route ================ //
Route::get(
    '/',
    [CatalogController::class, 'homepage']
)->name('catalog.homepage');

Route::get(
    'bai-viet/{slug}',
    [CatalogController::class, 'article']
)->name('catalog.article');

Route::get(
    'bai-viet',
    [CatalogController::class, 'getAllArticle']
)->name('catalog.article.getAllArticle');

Route::get(
    'danh-muc-bai-viet/{slug}',
    [CatalogController::class, 'getArticleByCategory']
)->name('catalog.article.getArticleByCategory');

Route::get(
    'san-pham/{slug}',
    [CatalogController::class, 'product']
)->name('catalog.product');

Route::get(
    'san-pham',
    [CatalogController::class, 'products']
)->name('catalog.products');

Route::get(
    'danh-muc/{slug}',
    [CatalogController::class, 'getProductByCategory']
)->name('catalog.product.getProductByCategory');

Route::get(
    'loai/{slug}',
    [CatalogController::class, 'getProductByGroup']
)->name('catalog.product.getProductByGroup');

Route::get(
    'cart',
    [CatalogController::class, 'cart']
)->name('catalog.cart');

Route::get(
    'payment',
    [CatalogController::class, 'payment']
)->name('catalog.payment');

Route::post(
    'process_payment',
    [CatalogController::class, 'postPayment']
)->name('catalog.postPayment');

Route::get(
    'promotion-payment',
    [CatalogController::class, 'promotionPayment']
)->name('catalog.promotionPayment');

Route::post(
    'process_promotion_payment',
    [CatalogController::class, 'postPromotionPayment']
)->name('catalog.postPromotionPayment');

Route::get(
    'dang-nhap-dang-ky',
    [CatalogController::class, 'getClientLogin']
)->name('catalog.clientLogin');

Route::post(
    'register',
    [CatalogController::class, 'postClientRegister']
)->name('catalog.postClientRegister');

Route::post(
    'postAddQuote',
    [CatalogController::class, 'postAddQuote']
)->name('catalog.postAddQuote');

Route::post(
    'search',
    [CatalogController::class, 'postSearch']
)->name('catalog.postSearch');

Route::get(
    'search',
    [CatalogController::class, 'getSearch']
)->name('catalog.getSearch');

Route::get(
    'quy-trinh-mua-nem',
    [CatalogController::class, 'procedure']
)->name('catalog.procedure');

Route::prefix('guarantee')->group(function () {
    Route::post(
        'add',
        [CatalogController::class, 'postAddGuarantee']
    )->name('catalog.postAddGuarantee');
});

/*
|--------------------------------------------------------------------------
| CLIENT ROUTES
|--------------------------------------------------------------------------
| - Shopping Cart
|--------------------------------------------------------------------------
*/

Route::prefix('shopping-cart')->group(function () {
    Route::get(
        'add',
        [ShoppingCartController::class, 'getAddToCart']
    )->name('cart.getAddToCart');

    Route::get(
        'add-promotion',
        [ShoppingCartController::class, 'getAddPromotionProduct']
    )->name('cart.getAddPromotionProduct');

    Route::get(
        'list',
        [ShoppingCartController::class, 'getList']
    )->name('cart.getList');

    Route::get(
        'remove_item',
        [ShoppingCartController::class, 'getRemoveItem']
    )->name('cart.getRemoveItem');

    Route::get(
        'update_item',
        [ShoppingCartController::class, 'getUpdateItem']
    )->name('cart.getUpdateItem');

    // Promotion cart routes (separate instance)
    Route::get(
        'promotion/list',
        [ShoppingCartController::class, 'getPromotionCartList']
    )->name('cart.getPromotionList');

    Route::get(
        'promotion/remove_item',
        [ShoppingCartController::class, 'getRemovePromotionItem']
    )->name('cart.getRemovePromotionItem');

    Route::get(
        'promotion/update_item',
        [ShoppingCartController::class, 'getUpdatePromotionItem']
    )->name('cart.getUpdatePromotionItem');
});

/*
|--------------------------------------------------------------------------
| CLIENT ROUTES
|--------------------------------------------------------------------------
| - Voucher
|--------------------------------------------------------------------------
*/

Route::prefix('vouchers')->group(function () {
    Route::post('/check', [ClientVoucherController::class, 'check'])->name('vouchers.check');
});

// ================ Admin Route ================ //
Route::get(
    'th-admin',
    [UserController::class, 'getAdminLogin']
)->middleware('autoLogin')->name('getAdminLogin');

Route::post(
    'login',
    [UserController::class, 'postAdminLogin']
)->name('postAdminLogin');

/*
|--------------------------------------------------------------------------
| CLIENT ROUTES
|--------------------------------------------------------------------------
| - Pages
|--------------------------------------------------------------------------
*/

Route::get(
    'pages/product/show/{id}',
    [FrontEndController::class, 'showProduct']
)->name('pages.product.show');

Route::prefix('th-admin')->middleware('auth')->group(function () {
    // Logout
    Route::get(
        'logout',
        [UserController::class, 'logout']
    )->name('admin.logout');

    // Admin Index
    Route::get(
        'index',
        [IndexController::class, 'index']
    )->name('admin.index');

    // User Module
    Route::prefix('system')->group(function () {

        Route::prefix('user')->group(function () {
            Route::get(
                'list',
                [UserController::class, 'getList']
            )->name('admin.user.getList');

            Route::get(
                'add',
                [UserController::class, 'getAdd']
            )->name('admin.user.getAdd');

            Route::post(
                'add',
                [UserController::class, 'postAdd']
            )->name('admin.user.postAdd');

            Route::get(
                'edit/{user_id}',
                [UserController::class, 'getEdit']
            )->name('admin.user.getEdit');

            Route::post(
                'edit',
                [UserController::class, 'postEdit']
            )->name('admin.user.postEdit');

            Route::get(
                'delete/{user_id}',
                [UserController::class, 'getDelete']
            )->name('admin.user.getDelete');

            Route::get(
                'reset-pass/{user_id}',
                [UserController::class, 'getResetPass']
            )->name('admin.user.getResetPass');

            Route::post(
                'reset-pass',
                [UserController::class, 'postResetPass']
            )->name('admin.user.postResetPass');
        });

        Route::prefix('config')->group(function () {
            Route::get(
                'index',
                [ConfigController::class, 'index']
            )->name('admin.config.index');

            Route::post(
                'update',
                [ConfigController::class, 'update']
            )->name('admin.config.update');
    
        });
    });

    // Article Module
    Route::prefix('article')->group(function () {
        Route::get(
            'list',
            [ArticleController::class, 'getList']
        )->name('admin.article.getList');

        Route::get(
            'add',
            [ArticleController::class, 'getAdd']
        )->name('admin.article.getAdd');

        Route::post(
            'add',
            [ArticleController::class, 'postAdd']
        )->name('admin.article.postAdd');

        Route::get(
            'edit/{article_id}',
            [ArticleController::class, 'getEdit']
        )->name('admin.article.getEdit');

        Route::post(
            'edit',
            [ArticleController::class, 'postEdit']
        )->name('admin.article.postEdit');

        Route::get(
            'delete/{article_id}',
            [ArticleController::class, 'getDelete']
        )->name('admin.article.getDelete');

        // Category
        Route::prefix('category')->group(function () {
            Route::get(
                'list',
                [ArticleCategoryController::class, 'getList']
            )->name('admin.article.category.getList');

            Route::get(
                'add',
                [ArticleCategoryController::class, 'getAdd']
            )->name('admin.article.category.getAdd');

            Route::post(
                'add',
                [ArticleCategoryController::class, 'postAdd']
            )->name('admin.article.category.postAdd');

            Route::get(
                'edit/{article_category_id}',
                [ArticleCategoryController::class, 'getEdit']
            )->name('admin.article.category.getEdit');

            Route::post(
                'edit',
                [ArticleCategoryController::class, 'postEdit']
            )->name('admin.article.category.postEdit');

            Route::get(
                'delete/{article_category_id}',
                [ArticleCategoryController::class, 'getDelete']
            )->name('admin.article.category.getDelete');
        });

    });

    // Product Module
    Route::prefix('product')->group(function () {
        Route::get(
            'list',
            [ProductController::class, 'getList']
        )->name('admin.product.getList');

        Route::get(
            'add',
            [ProductController::class, 'getAdd']
        )->name('admin.product.getAdd');

        Route::post(
            'add',
            [ProductController::class, 'postAdd']
        )->name('admin.product.postAdd');

        Route::get(
            'edit/{product_id}',
            [ProductController::class, 'getEdit']
        )->name('admin.product.getEdit');

        Route::post(
            'edit',
            [ProductController::class, 'postEdit']
        )->name('admin.product.postEdit');

        Route::get(
            'delete/{product_id}',
            [ProductController::class, 'getDelete']
        )->name('admin.product.getDelete');

        // Additional Image
        Route::prefix('image')->group(function () {
            Route::get(
                'add/{productId}',
                [ProductController::class, 'getAddImage']
            )->name('admin.product.image.getAddImage');

            Route::post(
                'add',
                [ProductController::class, 'postAddImage']
            )->name('admin.product.image.postAddImage');

            Route::get(
                'edit/{productId}/{imageId}',
                [ProductController::class, 'getEditImage']
            )->name('admin.product.image.getEditImage');

            Route::post(
                'edit',
                [ProductController::class, 'postEditImage']
            )->name('admin.product.image.postEditImage');

            Route::get(
                'delete/{imageId}',
                [ProductController::class, 'getDeleteImage']
            )->name('admin.product.image.getDeleteImage');
        });

        // Category
        Route::prefix('category')->group(function () {
            Route::get(
                'list',
                [ProductCategoryController::class, 'getList']
            )->name('admin.product.category.getList');

            Route::get(
                'add',
                [ProductCategoryController::class, 'getAdd']
            )->name('admin.product.category.getAdd');

            Route::post(
                'add',
                [ProductCategoryController::class, 'postAdd']
            )->name('admin.product.category.postAdd');

            Route::get(
                'edit/{category_id}',
                [ProductCategoryController::class, 'getEdit']
            )->name('admin.product.category.getEdit');

            Route::post(
                'edit',
                [ProductCategoryController::class, 'postEdit']
            )->name('admin.product.category.postEdit');

            Route::get(
                'delete/{category_id}',
                [ProductCategoryController::class, 'getDelete']
            )->name('admin.product.category.getDelete');
        });

        // Group Module
        Route::prefix('group')->group(function () {
            Route::get(
                'list',
                [ProductGroupController::class, 'getList']
            )->name('admin.product.group.getList');

            Route::get(
                'add',
                [ProductGroupController::class, 'getAdd']
            )->name('admin.product.group.getAdd');

            Route::post(
                'add',
                [ProductGroupController::class, 'postAdd']
            )->name('admin.product.group.postAdd');

            Route::get(
                'edit/{category_id}',
                [ProductGroupController::class, 'getEdit']
            )->name('admin.product.group.getEdit');

            Route::post(
                'edit',
                [ProductGroupController::class, 'postEdit']
            )->name('admin.product.group.postEdit');

            Route::get(
                'delete/{category_id}',
                [ProductGroupController::class, 'getDelete']
            )->name('admin.product.group.getDelete');
        });

        // Theme Module
        Route::prefix('theme')->group(function () {
            // Staff
            Route::prefix('staff')->group(function () {
                Route::get(
                    'index',
                    [StaffController::class, 'index']
                )->name('admin.theme.staff.index');

                Route::post(
                    'add',
                    [StaffController::class, 'postAdd']
                )->name('admin.theme.staff.postAdd');

                Route::get(
                    'edit/{staff_id}',
                    [StaffController::class, 'getEdit']
                )->name('admin.theme.staff.getEdit');

                Route::post(
                    'edit',
                    [StaffController::class, 'postEdit']
                )->name('admin.theme.staff.postEdit');

                Route::get(
                    'delete/{staff_id}',
                    [StaffController::class, 'getDelete']
                )->name('admin.theme.staff.getDelete');
            });

            // Partner
            Route::prefix('partner')->group(function () {
                Route::get(
                    'index',
                    [PartnerController::class, 'index']
                )->name('admin.theme.partner.index');

                Route::post(
                    'add',
                    [PartnerController::class, 'postAdd']
                )->name('admin.theme.partner.postAdd');

                Route::get(
                    'edit/{partner_id}',
                    [PartnerController::class, 'getEdit']
                )->name('admin.theme.partner.getEdit');

                Route::post(
                    'edit',
                    [PartnerController::class, 'postEdit']
                )->name('admin.theme.partner.postEdit');

                Route::get(
                    'delete/{partner_id}',
                    [PartnerController::class, 'getDelete']
                )->name('admin.theme.partner.getDelete');
            });

            // Slide
            Route::prefix('slide')->group(function () {
                Route::get(
                    'index',
                    [SlideController::class, 'index']
                )->name('admin.theme.slide.index');

                Route::post(
                    'add',
                    [SlideController::class, 'postAdd']
                )->name('admin.theme.slide.postAdd');

                Route::get(
                    'edit/{slide_id}',
                    [SlideController::class, 'getEdit']
                )->name('admin.theme.slide.getEdit');

                Route::post(
                    'edit',
                    [SlideController::class, 'postEdit']
                )->name('admin.theme.slide.postEdit');

                Route::get(
                    'delete/{slide_id}',
                    [SlideController::class, 'getDelete']
                )->name('admin.theme.slide.getDelete');
            });
        });
    });

    // Customer Module
    Route::prefix('customer')->group(function () {
        Route::get(
            'list',
            [CustomerController::class, 'getList']
        )->name('admin.customer.getList');
    });

    // Quote Module
    Route::prefix('quote')->group(function () {
        Route::get(
            'list',
            [QuoteController::class, 'getList']
        )->name('admin.quote.getList');

        Route::get(
            'delete/{id}',
            [QuoteController::class, 'getDelete']
        )->name('admin.quote.getDelete');

        Route::get(
            'status/{id}',
            [QuoteController::class, 'changeStatus']
        )->name('admin.quote.changeStatus');
    });

    // Quote Module
    Route::prefix('guarentee')->group(function () {
        Route::get(
            'list',
            [GuaranteeController::class, 'index']
        )->name('admin.guarantee.index');

        Route::get(
            'delete/{id}',
            [QuoteController::class, 'getDelete']
        )->name('admin.quote.getDelete');

        Route::get(
            'status/{id}',
            [QuoteController::class, 'changeStatus']
        )->name('admin.quote.changeStatus');
    });

    // Invoice Module
    Route::prefix('invoices')->group(function () {
        Route::get(
            'index',
            [InvoiceController::class, 'index']
        )->name('admin.invoices.index');

        Route::get(
            'edit/{id}',
            [InvoiceController::class, 'edit']
        )->name('admin.invoices.edit');

        Route::post(
            'save',
            [InvoiceController::class, 'save']
        )->name('admin.invoices.save');
    });

    // Report Module
    Route::prefix('report')->group(function () {
        Route::get(
            'report-revenue-by-month',
            [ReportController::class, 'reportRevenueByMonth']
        )->name('admin.report.reportRevenueByMonth');
    });

    // Vouchers
    Route::get('vouchers/list', [VoucherController::class, 'list'])
        ->name('th-admin.vouchers.list');

    Route::resource('vouchers', VoucherController::class)
        ->except(['create', 'edit'])
        ->names([
            'index'   => 'admin.vouchers.index',
            'store'   => 'admin.vouchers.store',
            'update'  => 'admin.vouchers.update',
            'destroy' => 'admin.vouchers.destroy',
        ]);

    // Landing Pages
    Route::get('landing/list', [LandingController::class, 'list'])
        ->name('admin.landing.list');

    Route::resource('landing', LandingController::class)
        ->except(['create', 'edit'])
        ->names([
            'index'   => 'admin.landing.index',
            'store'   => 'admin.landing.store',
            'update'  => 'admin.landing.update',
            'destroy' => 'admin.landing.destroy',
            'show'   => 'admin.landing.show',
        ]);

    Route::get('landing-category/delete/{id}', [PageCategoryController::class, 'delete'])->name('admin.landing.category.delete');
    Route::resource('landing-category', PageCategoryController::class)
        ->except(['show', 'destroy'])
        ->names([
            'index'   => 'admin.landing.category.index',
            'create'   => 'admin.landing.category.create',
            'store'   => 'admin.landing.category.store',
            'edit'  => 'admin.landing.category.edit',
            'update'  => 'admin.landing.category.update',
        ]);
    
    Route::post('landing-product/image/upload', [PageProductController::class, 'uploadImage'])->name('admin.landing.product.image.upload');
    Route::get('landing-product/image/list/{product_id}', [PageProductController::class, 'listImage'])->name('admin.landing.product.image.list');
    Route::delete('landing-product/image/delete/{id}', [PageProductController::class, 'deleteImage'])->name('admin.landing.product.image.delete');
    Route::resource('landing-product', PageProductController::class)
        ->except(['show'])
        ->names([
            'index'   => 'admin.landing.product.index',
            'create'   => 'admin.landing.product.create',
            'store'   => 'admin.landing.product.store',
            'edit'  => 'admin.landing.product.edit',
            'update'  => 'admin.landing.product.update',
            'destroy'  => 'admin.landing.product.destroy',
        ]);

    // Distribution System Module
    Route::resource('distribution-system', DistributionSystemController::class)->except([
        'create', 'edit'
    ]);

    // ================ File Manager Route ================ //
    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

Route::prefix('ajax')->group(function () {
    Route::get(
        'get_district_by_province_id',
        [AjaxController::class, 'getDistrictsByProvinceId']
    )->name('ajax.getDistrictsByProvinceId');

    Route::get(
        'get_ward_by_district_id',
        [AjaxController::class, 'getWardsByDistrictId']
    )->name('ajax.getWardsByDistrictId');

    Route::get(
        'get_distribution_system',
        [AjaxController::class, 'getDistributionSystem']
    )->name('ajax.getDistributionSystem');
});

// Setup route for landing page
Route::get('{slug}', [FrontEndController::class, 'index'])->where('slug', '.*');