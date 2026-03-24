<?php 

use Illuminate\Support\Str;

if (!function_exists('slugify')) {
    function slugify($text)
    {
        return Str::slug($text, '-');
    }
}

if (!function_exists('generate_url')) {
    function generate_url($post, $locale = null)
    {
         $locale = $locale ?? app()->getLocale();

        $categorySlug = slugify($post->categories->first()->name ?? 'undefined');

        $slug = $post->slug
            ? slugify($post->slug)
            : slugify($post->title);

        return url(sprintf(
            '%s/%s/%s-%d',
            $locale,
            $categorySlug,
            $slug,
            $post->id
        ));
    }
}

if (!function_exists('get_id_from_url')) {
    function get_id_from_url($url)
    {
        $path = parse_url($url, PHP_URL_PATH);

        $segments = explode('/', trim($path, '/'));
        $lastSegment = end($segments);

        return extract_id_from_slug($lastSegment);
    }
}

if (!function_exists('extract_id_from_slug')) {
    function extract_id_from_slug($slug)
    {
        if (preg_match('/-(\d+)$/', $slug, $matches)) {
            return (int) $matches[1];
        }

        return null;
    }
}