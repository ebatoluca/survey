<?php

namespace App\Console\Commands;

use File;
use Illuminate\Routing\Router;
use Illuminate\Console\Command;

class RouteJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate routes for javascript.';


    protected $router;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Router $router)
    {
        parent::__construct();

        $this->router = $router;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $path = base_path('resources/assets/json');

        if (!file_exists($path)) mkdir($path, 0777, true);

        $routes = [];

        foreach ($this->router->getRoutes() as $route) {
            
            $routes[$route->getName()] = $route->uri();

        }

        File::put('resources/assets/json/routes.json', json_encode($routes, JSON_PRETTY_PRINT));

        return 0;

    }
    
}
