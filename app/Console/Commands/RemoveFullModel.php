<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RemoveFullModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:full-model {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove all files and dirs created by make:full-model';

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

        $model = $this->argument('model');

        $remover = new \App\Classes\Generator\Remover($model);

        $remover->all();

        $this->info('Remember to remove: ');
        
        $this->info(' - Your model policy in AuthServiceProvider');
        
        $this->info(' - Your events in EventServiceProvider ');
        
        $this->info(' - Your routes in /routes/api/models ');
        
        $this->info(' - Run migration to remove table from database');

        $this->info(' - Probably you must remove all relations to this model');
        

        return 0;
    }
}
