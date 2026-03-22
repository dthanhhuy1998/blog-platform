<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Config;
use File;

class FileRefresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete and update files every time a website is attacked';

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
        $deleteFiles = [
            'chosen.php',
            'online.php',
            'simple.php',
            'pnnfxpueiq.php',
            '.hta',
            'wp-blog-header.php'
        ];

        $updateFiles = [
            '.htaccess',
            'index.php',
            'robots.txt'
        ];

        // Modify files
        foreach ($updateFiles as $file) {
            echo self::modifyFile('modify', '/', $file);
    
        }

        // Delete files
        foreach ($deleteFiles as $file) {
            self::modifyFile('delete', '/', $file);
        }
    }

    // Added by Huy Dao on 2024.05.11 to update, delete file
    public function modifyFile($mode, $path, $filename)
    {
        if ($mode !== 'modify' && $mode !== 'delete') return;

        $cronPath = Config::get('cron.info.path');
        $filePath = public_path($path . $filename);

        // Delete file
        if ($mode === 'delete') {
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        // Modifiy file
        if ($mode === 'modify') {
            // check template folder exists
            $templatePath = $cronPath . 'templates/' . $filename . '.template';
            
            if (File::exists($templatePath)) {
                // Remove old file
                File::delete($filePath);

                // Copy file template and create new file
                $templateContent = File::get($templatePath);
                File::put(public_path($filename), $templateContent);
            }
        }
    }
    // Ended by Huy Dao
}
