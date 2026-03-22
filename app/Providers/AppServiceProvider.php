<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\Settings\Config as ConfigService;
use App\Models\ProductCategory;
use App\Models\ProductGroup;
use App\Models\Article;
use App\Models\Config;
use App\Models\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share(
            'appFavicon',
            ConfigService::get('favicon', 'favicon.ico')
        );

        View::share(
            'appLogo',
            ConfigService::get('logo', 'logo.png')
        );

        View::composer('catalog.common.head', function ($view) {
            $headerScript = ConfigService::get('header_embed_code');

            $view->with([
                'headerScript' => $headerScript,
            ]);
        });
        
        View::composer('catalog.common.header', function ($view) {
            $menus = Menu::where('status', 1)->orderBy('sort_order', 'asc')->get();

            $view->with([
                'menus' => $menus
            ]);
        });

        View::composer('catalog.common.footer', function ($view) {
            $footerConfig['contact'] = ConfigService::get('contact');
            $footerConfig['phone'] = ConfigService::get('phone');
            $footerConfig['gmail'] = ConfigService::get('gmail');
            $footerConfig['address'] = ConfigService::get('address');
            $footerConfig['copyright'] = ConfigService::get('copyright_text');

            $view->with([
                'footerConfig' => $footerConfig,
            ]);
        });

        View::composer('catalog.common.scripts', function ($view) {
            $footerScript = ConfigService::get('footer_embed_code');

            $view->with([
                'footerScript' => $footerScript,
            ]);
        });
    }
}
