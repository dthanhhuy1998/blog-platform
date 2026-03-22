<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Landing\Page;

class LandingController extends Controller
{
    public function index()
    {
        $headingTitle = heading(__('Page List'));
        $pageTitle = __('Page List');

        return view('admin.pages.landing.index',
            compact('headingTitle', 'pageTitle')
        );
    }

    public function list(Request $request)
    {
        $query = Page::query();

        $total = $query->count();

        $data = $query
            ->offset($request->start)
            ->limit($request->length)
            ->orderBy('updated_at', 'desc')
            ->get();
        
        $data = $data->map(function ($item) {
            return [
                'id' => e($item->id),
                'theme_key' => $item->theme_key,
                'name' => $item->name,
                'slug' => $item->slug,
                'status' => view('admin.pages.landing.partials.status', compact('item'))->render(),
                'created_at' => datetime_vi($item->created_at),
                'actions' => view('admin.pages.landing.partials.actions', compact('item'))->render(),
            ];
        });

        return response()->json([
            'draw'            => intval($request->draw),
            'recordsTotal'    => $total,
            'recordsFiltered' => $total,
            'data'            => $data,
        ]);
    }

    public function show(Page $page)
    {

    }
}
