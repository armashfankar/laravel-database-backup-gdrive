<?php

namespace App\Console\Commands;

use App\CustomMySql;
use Illuminate\Console\Command;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class BackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:mysql';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Uploads mysql backup to google drive';

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
        $filename = "dump-" . date('Y-m-d-h-i-s') . ".sql";
        $filenameWithDir = storage_path("app" . DIRECTORY_SEPARATOR . $filename);
        $tempFileHandle = storage_path("app". DIRECTORY_SEPARATOR ."custom-temp.tmp");
        CustomMySql::create()
            ->setDbName(env("DB_DATABASE"))
            ->setUserName(env("DB_USERNAME"))
            ->setPassword(env("DB_PASSWORD"))
            ->dumpToFile($filenameWithDir);
        Storage::disk('google')->putFileAs('', new File($filenameWithDir), $filename);
        unlink($filenameWithDir);
        unlink($tempFileHandle);

    }
}
