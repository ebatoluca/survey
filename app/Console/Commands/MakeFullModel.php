<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Classes\Generator\Backend\Controller\ControllerGenerator;
use App\Classes\Generator\Backend\Events\EventsGenerator;
use App\Classes\Generator\Backend\Excel\ExcelGenerator;
use App\Classes\Generator\Backend\Export\ExportGenerator;
use App\Classes\Generator\Backend\Factory\FactoryGenerator;
use App\Classes\Generator\Backend\Filters\FiltersGenerator;
use App\Classes\Generator\Backend\Migration\MigrationGenerator;
use App\Classes\Generator\Backend\Model\ModelGenerator;
use App\Classes\Generator\Backend\ModelTraits\Traits\AssignmentTraitGenerator;
use App\Classes\Generator\Backend\ModelTraits\Traits\MutatorsTraitGenerator;
use App\Classes\Generator\Backend\ModelTraits\Traits\OperationsTraitGenerator;
use App\Classes\Generator\Backend\ModelTraits\Traits\QueryTraitGenerator;
use App\Classes\Generator\Backend\ModelTraits\Traits\RelationsTraitGenerator;
use App\Classes\Generator\Backend\ModelTraits\Traits\StorageTraitGenerator;
use App\Classes\Generator\Backend\Notification\NotificationGenerator;
use App\Classes\Generator\Backend\Policy\PolicyGenerator;
use App\Classes\Generator\Backend\Requests\RequestsGenerator;
use App\Classes\Generator\Backend\Resource\ResourceGenerator;
use App\Classes\Generator\Backend\Route\RouteGenerator;
use App\Classes\Generator\Backend\Test\TestGenerator;
use App\Classes\Generator\Backend\Register\RegisterGenerator;

use App\Classes\Generator\Frontend\AdminRoute\AdminRouteGenerator;
use App\Classes\Generator\Frontend\AdminView\AdminViewGenerator;
use App\Classes\Generator\Frontend\CreateForm\CreateFormGenerator;
use App\Classes\Generator\Frontend\CreateView\CreateViewGenerator;
use App\Classes\Generator\Frontend\Crud\CrudGenerator;
use App\Classes\Generator\Frontend\EditForm\EditFormGenerator;
use App\Classes\Generator\Frontend\EditView\EditViewGenerator;
use App\Classes\Generator\Frontend\FilterForm\FilterFormGenerator;
use App\Classes\Generator\Frontend\JsModel\JsModelGenerator;
use App\Classes\Generator\Frontend\ShowView\ShowViewGenerator;

class MakeFullModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:full-model {model : Nombre del modelo en formato Pascal Case}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new full model ecosystem';

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

        $ControllerGenerator = new ControllerGenerator($model);

        $EventsGenerator = new EventsGenerator($model);

        $ExcelGenerator = new ExcelGenerator($model);

        $ExportGenerator = new ExportGenerator($model);

        $FiltersGenerator = new FiltersGenerator($model);

        $FactoryGenerator = new FactoryGenerator($model);

        $MigrationGenerator = new MigrationGenerator($model);

        $ModelGenerator = new ModelGenerator($model);

        $AssignmentTraitGenerator = new AssignmentTraitGenerator($model);

        $MutatorsTraitGenerator = new MutatorsTraitGenerator($model);

        $OperationsTraitGenerator = new OperationsTraitGenerator($model);

        $QueryTraitGenerator = new QueryTraitGenerator($model);

        $RelationsTraitGenerator = new RelationsTraitGenerator($model);

        $StorageTraitGenerator = new StorageTraitGenerator($model);

        $NotificationGenerator = new NotificationGenerator($model);

        $PolicyGenerator = new PolicyGenerator($model);

        $RequestsGenerator = new RequestsGenerator($model);

        $ResourceGenerator = new ResourceGenerator($model);

        $RouteGenerator = new RouteGenerator($model);

        $TestGenerator = new TestGenerator($model);

        $RegisterGenerator = new RegisterGenerator($model);



        $AdminRouteGenerator = new AdminRouteGenerator($model);

        $AdminViewGenerator = new AdminViewGenerator($model);

        $CreateFormGenerator = new CreateFormGenerator($model);

        $CreateViewGenerator = new CreateViewGenerator($model);

        $CrudGenerator = new CrudGenerator($model);

        $EditFormGenerator = new EditFormGenerator($model);

        $EditViewGenerator = new EditViewGenerator($model);

        $FilterFormGenerator = new FilterFormGenerator($model);

        $JsModelGenerator = new JsModelGenerator($model);

        $ShowViewGenerator = new ShowViewGenerator($model);


        $this->info('In the backend remember to:');
        
        $this->info(' - Register your model policy.');
        
        $this->info(' - Register your events in EventServiceProvider ');
        
        $this->info(' - Register your routes in /routes/api/models ');
        
        $this->info(' - Fill your migrations fields and then migrate ');

        $this->info(' - Fill your factory fields to test models ');

        $this->info('In the frontend remember to:');

        $this->info(' - Register your routes in vue/router/routes/admin/routes/index.js ');
        
        $this->info('You can check the registration help in /storage/registers');

        return 0;

    }

}
