<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use DB;
use App\Models\ProductDescription;
use App\Models\Article;

class ModifyStorageLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:modify-storage-link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Modify image link in content html';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo "Migrate started..\n";
        echo "Migrating.. \n\n";

        self::migrateProduct();
        echo "\n";
        self::migrateArticle();
        
        echo "\n";
        echo "Migrate ended.";
    }

    public function migrateProduct() {
        // Migrate link for product module
        $total = ProductDescription::count();
        $products = ProductDescription::select('id', 'name', 'detail')->get();
                
        echo '[Product] Total: ' . $total . "\n";

        $count = 0;
        if (count($products)) {
            foreach ($products as $product) {
                $html = $product->detail;
                $newHTML = str_replace('storage/app/public/photos', 'storage/photos/', $html);

                // Update
                DB::table('product_description')
                ->where('id', $product->id)
                ->update(['detail' => $newHTML]);

                try {
                    $notice = "[Product] Migrate for id: " . $product->id . " | " . $product->name . " | " . "Success \n";
                    echo $notice;

                    $count++;
                }
                catch (Exception $execption) {
                    echo $execption;
                }
            }
        }

        echo "[Product] Migrate successfully with a total of " . $count . "\n";
    }

    public function migrateArticle() {
        // Migrate link for article module
        $total = Article::count();
        $articles = Article::select('id', 'title', 'content')->get();
                
        echo '[Article] Total: ' . $total . "\n";

        $count = 0;
        if (count($articles)) {
            foreach ($articles as $article) {
                $html = $article->content;
                $newHTML = str_replace('storage/app/public/photos', 'storage/photos/', $html);

                // Update
                DB::table('article')
                ->where('id', $article->id)
                ->update(['content' => $newHTML]);

                try {
                    $notice = "[Article] Migrate for id: " . $article->id . " | " . $article->title . " | " . "Success \n";
                    echo $notice;

                    $count++;
                }
                catch (Exception $execption) {
                    echo $execption;
                }
            }
        }

        echo "[Article] Migrate successfully with a total of " . $count . "\n";
    }
}
