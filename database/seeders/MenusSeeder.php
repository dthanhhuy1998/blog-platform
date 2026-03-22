<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'name' => 'Cửa hàng',
                'link' => route('catalog.products'),
                'target' => '_self',
                'icon' => '',
                'type' => 'default',
                'sort_order' => 1,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'P.A.N',
                'link' => route('catalog.article', 'gioi-thieu-so-luoc-ve-pan'),
                'target' => '_self',
                'icon' => '',
                'type' => 'default',
                'sort_order' => 2,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Hệ thống phân phối',
                'link' => route('catalog.article', 'he-thong-phan-phoi'),
                'target' => '_self',
                'icon' => '',
                'type' => 'default',
                'sort_order' => 3,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Khách hàng doanh nghiệp',
                'link' => route('catalog.article.getArticleByCategory', 'khach-hang-doanh-nghiep'),
                'target' => '_self',
                'icon' => '',
                'type' => 'default',
                'sort_order' => 4,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Tin tức - Sự kiện',
                'link' => route('catalog.article.getArticleByCategory', 'tin-tuc-su-kien'),
                'target' => '_self',
                'icon' => '',
                'type' => 'default',
                'sort_order' => 5,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Tuyển dụng',
                'link' => route('catalog.article.getArticleByCategory', 'tuyen-dung'),
                'target' => '_self',
                'icon' => '',
                'type' => 'default',
                'sort_order' => 6,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Video Clips',
                'link' => route('catalog.article.getArticleByCategory', 'video-clips'),
                'target' => '_self',
                'icon' => '',
                'type' => 'default',
                'sort_order' => 7,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Quy trình mua nệm',
                'link' => route('catalog.procedure'),
                'target' => '_self',
                'icon' => '',
                'type' => 'default',
                'sort_order' => 8,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Liên hệ',
                'link' => route('catalog.article', 'lien-he-voi-pan'),
                'target' => '_self',
                'icon' => '',
                'type' => 'default',
                'sort_order' => 8,
                'status' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
