<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generateSKU() {
        return substr(time(), -8);
    }

    public function seo_tools($title, $description, $keyword, $imageUrl, $url) {
        SEOMeta::setTitle($title)
        ->setDescription($description)
        ->addKeyword($keyword);

        OpenGraph::addImage($imageUrl)
        ->setTitle($title)
        ->setDescription($description)
        ->setUrl($url)
        ->setSiteName(getenv('APP_URL'));

        TwitterCard::setTitle($title)
        ->setDescription($description)
        ->setImage($imageUrl)
        ->setUrl($url)
        ->setSite(getenv('APP_URL'));

        JsonLd::setTitle($title)
        ->setDescription($description)
        ->setImage($imageUrl)
        ->setUrl($url)
        ->setSite(getenv('APP_URL'));
    }
}
