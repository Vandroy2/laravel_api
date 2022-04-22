<?php

namespace App\Console\Commands;
use App\Services\ImportDataService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;

class ImportDataCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'import:data';

    /**
     * @var string
     */
    protected $description = 'Import data from api service';

    /**
     * @throws GuzzleException|GuzzleException
     */
    public function handle()
    {
        ImportDataService::importData();
    }
}
