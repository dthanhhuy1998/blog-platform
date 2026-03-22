<?php

namespace App\Http\Controllers\Pages;

use App\Enums\PageProductStatus;
use App\Http\Controllers\Pages\BaseController;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\Landing\Page;
use App\Models\Landing\Config as LPConfig;
use App\Models\Landing\PageProduct;

class FrontEndController extends BaseController
{
    public function __construct()
    {
        // Load global asset links
        $this->addStyleFiles(config('landing.global_css'));
        $this->addScriptFiles(config('landing.global_js'));
    }

    public function index($slug)
    {
        $page = Page::with('sections')->where('slug', trim($slug))->firstOrFail();
        $theme = $this->loadTheme($page->theme_key);

        // Set favicon
        $faviconConfig = LPConfig::select('config_key', 'config_value')->where('page_id', $page->id)->where('config_key', 'favicon')->first();
        $favicon = json_decode($faviconConfig->config_value, TRUE);

        // SEOTools
        $SEOInfosConfig = LPConfig::select('config_key', 'config_value')->where('page_id', $page->id)->where('config_key', 'seo_infos')->first();
        $SEOInfos = !empty($SEOInfosConfig) ? json_decode($SEOInfosConfig->config_value, TRUE) : [];

        // Load Product
        $defineCategories = [
            'single_product' => 'san-pham-le',
            'combo_product' => 'san-pham-combo'
        ];

        $singleProducts = PageProduct::where('status', PageProductStatus::ACTIVE)
            ->whereHas('categories', function ($q) use ($defineCategories) {
                $q->where('slug', $defineCategories['single_product']);
            })
            ->inRandomOrder()
            ->get();

        $comboProducts = PageProduct::where('status', PageProductStatus::ACTIVE)
            ->whereHas('categories', function ($q) use ($defineCategories) {
                $q->where('slug', $defineCategories['combo_product']);
            })
            ->inRandomOrder()
            ->get();

        $this->seo_tools(
            $SEOInfos['title'],
            $SEOInfos['description'],
            implode(', ', $SEOInfos['keywords']),
            $SEOInfos['thumb'],
            URL::current()
        );

        // Add asset files
        if (!empty($theme['css'])) {
            $this->addStyleFiles(
                array_map(fn($f) => asset("themes/{$page->theme_key}/{$f}"), $theme['css'])
            );
        }

        if (!empty($theme['js'])) {
            $this->addScriptFiles(
                array_map(fn($f) => asset("themes/{$page->theme_key}/{$f}"), $theme['js'])
            );
        }

        return view('landing.'. $page->theme_key, array_merge(
            compact('page', 'theme', 'favicon', 'singleProducts', 'comboProducts'),
            $this->shareAssetsToView()
        ));
    }

    public function showProduct($id)
    {
        $product = PageProduct::findOrFail($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => __(':module not found', ['module' => __('Product')]),
            ]);
        }
        
        return response()->json([
            'success' => true,
            'data' => view('landing.partials.product-info', compact('product'))->render(),
        ]);
    }
}
