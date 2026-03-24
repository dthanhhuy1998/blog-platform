<?php 

namespace App\Helpers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class SEOHelper {
    public static function setSEO (
        string $title,
        ?string $description = null,
        ?string $url = null,
        ?string $image = null,
        string $type = 'website'
    ) {
        $siteName = config('app.name');

        $fullTitle = $title;

        $description = $description ?: config('seo.description') ?? '';

        $image = $image ?: asset('images/seo/default-og.jpg');

        $url = $url ?: url()->current();

        /*
        |--------------------------------------------------------------------------
        | SEOMeta
        |--------------------------------------------------------------------------
        */
        SEOMeta::setTitle($fullTitle);
        SEOMeta::setDescription($description);
        SEOMeta::setCanonical($url);

        /*
        |--------------------------------------------------------------------------
        | OpenGraph
        |--------------------------------------------------------------------------
        */
        OpenGraph::setTitle($fullTitle);
        OpenGraph::setDescription($description);
        OpenGraph::setType($type);
        OpenGraph::setUrl($url);
        OpenGraph::addImage($image);

        /*
        |--------------------------------------------------------------------------
        | Twitter
        |--------------------------------------------------------------------------
        */
        TwitterCard::setTitle($fullTitle);
        TwitterCard::setDescription($description);
        TwitterCard::setImage($image);

        /*
        |--------------------------------------------------------------------------
        | JSON-LD
        |--------------------------------------------------------------------------
        */
        JsonLd::setTitle($fullTitle);
        JsonLd::setDescription($description);
        JsonLd::addImage($image);
    }
}