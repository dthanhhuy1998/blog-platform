<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected array $styles = [];
    protected array $scripts = [];

    public function addStyleFiles(array|string $paths): void
    {
        if (is_string($paths)) {
            $paths = [$paths];
        }

        foreach ($paths as $path) {
            $this->styles[] = $path;
        }
    }

    public function addScriptFiles(array|string $paths): void
    {
        if (is_string($paths)) {
            $paths = [$paths];
        }

        foreach ($paths as $path) {
            $this->scripts[] = $path;
        }
    }

    protected function loadTheme($themeKey)
    {
        $path = resource_path("themes/{$themeKey}.json");
        return json_decode(file_get_contents($path), true);
    }

    protected function shareAssetsToView()
    {
        return [
            'styles'  => $this->styles,
            'scripts' => $this->scripts,
        ];
    }
}
