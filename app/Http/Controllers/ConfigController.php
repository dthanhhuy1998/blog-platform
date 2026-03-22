<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Config;
use Storage;
use DB;

class ConfigController extends Controller
{
    public function index() {
        $configs = Config::getAllConfig();

        $headingTitle = heading('Cấu hình chung');
        $pageTitle = 'Cấu hình chung';

        return view('admin.pages.config.index', compact(
            'headingTitle',
            'pageTitle',
            'configs'
        ));
    }

    public function update(Request $request) {
        // Check data input
        $updateData = [];

        if (count($request->all()) > 0) {
            foreach($request->all() as $key => $value) {
                $updateData[$key] = $value;

                if (array_key_exists('favicon', $request->all())) {
                    if (!empty(Config::getConfig('favicon')))
                        Storage::disk('public')->delete(Config::getConfig('favicon'));

                    $updateData['favicon'] = Storage::disk('public')->putFile('upload/config', $request->file('favicon'));
                }

                if (array_key_exists('logo', $request->all())) {
                    if (!empty(Config::getConfig('logo')))
                        Storage::disk('public')->delete(Config::getConfig('logo'));

                    $updateData['logo'] = Storage::disk('public')->putFile('upload/config', $request->file('logo'));
                }
            }
            // Update config data
            foreach($updateData as $key => $value) {
                Config::updateOrCreate(
                    ['conf_key' => $key],
                    ['conf_value' => $value]
                );
            }
        }

        return redirect()->back()->with('success_msg', 'Cập nhập cấu hình thành công');
    }
}
