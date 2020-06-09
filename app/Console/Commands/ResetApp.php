<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ResetApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean database, database_created and public/storage folder';

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
     * @return mixed
     */
    public function handle()
    {
        if ($this->confirm('Do you wish to continue? This will delete your tables')) {
            Artisan::call('media-library:clear --force');
            Artisan::call('migrate:reset --force');
            \Storage::disk('local')->delete('database_created');

            // $file = new Filesystem;
            // $file->cleanDirectory('public/storage');
        }
    }
}
