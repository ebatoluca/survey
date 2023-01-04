<?php

namespace App\Classes\Generator;

use Doctrine\Inflector\Inflector; // Docs: https://www.doctrine-project.org/projects/doctrine-inflector/en/2.0/index.html
use Doctrine\Inflector\NoopWordInflector;
use Illuminate\Support\Pluralizer;

class AutoGenerator
{	

	// INFLECTOR

		protected $inflector;

	// MODEL NAME

		protected $ModelName;

		protected $snake_case_model_name;

		protected $camelCaseModelName;

		protected $PascalCaseModelName;

		protected $kebabcasemodelname;

		protected $dotModelName;

		protected $pluralModelName;

		protected $plural_snake_case_model_name;

		protected $pluralCamelCaseModelName;

		protected $PluralPascalCaseModelName;

		protected $pluralkebabcasemodelname;

		protected $pluralDotModelName;

	// PATHS

		protected $apiRoutepath;

		protected $controllerPath;

		protected $modelPath;

		protected $modelTraitsPath;

		protected $eventsPath;

		protected $excelPath;

		protected $notificationPath;

		protected $exportPath;

		protected $filtersPath;

		protected $requestPath;

		protected $resourcePath;

		protected $policyPath;

		protected $migrationPath;

		protected $factoryPath;

		protected $testPath;

		protected $registerPath;

		///////////////////////////////////////////////////////////////////////////////////////////////////

		protected $adminRoutePath;

		protected $adminViewPath;

		protected $modelFormPath;

		protected $createFormPath;

		protected $createViewPath;

		protected $crudPath;

		protected $editFormPath;

		protected $editViewPath;

		protected $filterFormPath;

		protected $jsModelPath;

		protected $showViewPath;

	// REGISTER FILES

		protected $apiRouteModelFile;

		protected $eventServiceProviderFile;

		protected $authServiceProviderFile;

	// TEMPLATE PATHS

		protected $controllerTemplatePath;

		protected $eventsTemplatePath;

		protected $excelTemplatePath;

		protected $exportTemplatePath;

		protected $filtersTemplatePath;

		protected $migrationTemplatePath;

		protected $factoryTemplatePath;

		protected $modelTemplatePath;

		protected $modelTraitsTemplatePath;

		protected $notificationTemplatePath;

		protected $policyTemplatePath;

		protected $requestsTemplatePath;

		protected $resourceTemplatePath;

		protected $routeTemplatePath;

		protected $testTemplatePath;

		protected $registerTemplatePath;

		///////////////////////////////////////////////////////////////////////////////////////////////////

		protected $adminRouteTemplatePath;

		protected $adminViewTemplatePath;

		protected $createFormTemplatePath;

		protected $createViewTemplatePath;

		protected $crudTemplatePath;

		protected $editFormTemplatePath;

		protected $editViewTemplatePath;

		protected $filterFormTemplatePath;

		protected $jsModelTemplatePath;

		protected $showViewTemplatePath;

	/*
	 * $ModelName: 
	 *  - Debe corresponder con el nombre del modelo que se está creando
	 *  - Debe estar escrito en PascalCase
	 */

	public function __construct(string $ModelName)
	{

		abort_unless(env('APP_ENV') == 'local', 403);

		$this->inflector = new Inflector(new NoopWordInflector(), new NoopWordInflector());

		$this->setModelName($ModelName);

		$this->setDirPaths();

		$this->setFilePaths();

		$this->setTemplatesPaths();

	}

	// MODEL NAME

		protected function setModelName($ModelName)
		{

			$this->ModelName = $ModelName;

			$this->snake_case_model_name = $this->inflector->tableize($this->ModelName);

			$this->camelCaseModelName = $this->inflector->camelize($this->snake_case_model_name);

			$this->PascalCaseModelName = $this->inflector->classify($this->snake_case_model_name);

			$this->kebabcasemodelname = str_replace('_', '-', $this->snake_case_model_name);

			$this->dotModelName = str_replace('_', '.', $this->snake_case_model_name);

			$this->pluralModelName = Pluralizer::plural($this->ModelName);

			$this->plural_snake_case_model_name = Pluralizer::plural($this->snake_case_model_name);

			$this->pluralCamelCaseModelName = Pluralizer::plural($this->camelCaseModelName);

			$this->PluralPascalCaseModelName = Pluralizer::plural($this->PascalCaseModelName);

			$this->pluralkebabcasemodelname = Pluralizer::plural($this->kebabcasemodelname);

			$this->pluralDotModelName = Pluralizer::plural($this->dotModelName);

		}

	// DIR PATHS

		protected function setDirPaths() 
		{

			$this->apiRoutepath = $this->getPath('routes/api/models');

			$this->controllerPath = $this->getPath('app/Http/Controllers');

			$this->modelPath = $this->getPath('app/Models');

			$this->modelTraitsPath = $this->getPath('app/Models/Traits');

			$this->eventsPath = $this->getPath('app/Http/Events');

			$this->excelPath = $this->getPath('resources/views/excel');

			$this->notificationPath = $this->getPath('app/Notifications');

			$this->exportPath = $this->getPath('app/Exports');

			$this->filtersPath = $this->getPath('app/Models/Filters');

			$this->requestPath = $this->getPath('app/Http/Requests');

			$this->resourcePath = $this->getPath('app/Http/Resources/Models');

			$this->policyPath = $this->getPath('app/Policies');

			$this->migrationPath = $this->getPath('database/migrations');

			$this->factoryPath = $this->getPath('database/factories');

			$this->testPath = $this->getPath('tests/Feature/Models');

			$this->registerPath = $this->getPath('storage/registers');

			///////////////////////////////////////////////////////////////////////////////////////////////////

			$this->adminRoutePath = $this->getPath('resources/vue/router/routes/admin/routes/group');

			$this->adminViewPath = $this->getPath('resources/vue/views/admin'); 

			$this->modelFormPath = $this->getPath('resources/vue/elements/forms/models'); 
			                                                                      
			$this->createFormPath = $this->getPath('resources/vue/elements/forms/models'); 

			$this->createViewPath = $this->getPath('resources/vue/views/admin'); 

			$this->crudPath = $this->getPath('resources/vue/elements/cruds');

			$this->editFormPath = $this->getPath('resources/vue/elements/forms/models'); 

			$this->editViewPath = $this->getPath('resources/vue/views/admin'); 

			$this->filterFormPath = $this->getPath('resources/vue/elements/forms/filters');

			$this->jsModelPath = $this->getPath('resources/assets/js/models');

			$this->showViewPath = $this->getPath('resources/vue/views/admin'); 	

		}

		protected function getPath($path)
		{

			$path = base_path($path);

			if (!file_exists($path)) mkdir($path, 0777, true);

	        return $path;

		}

	// FILE PATHS

		protected function setFilePaths()
		{

			$this->apiRouteModelFile = base_path('routes/api/models.php');

			$this->eventServiceProviderFile = base_path('app/Providers/EventServiceProvider.php');

			$this->authServiceProviderFile = base_path('app/Providers/AuthServiceProvider.php');

		}

	// TEMPLATE PATHS

		protected function setTemplatesPaths()
		{

			$this->controllerTemplatePath = base_path('app/Classes/Generator/Backend/Controller/Templates');

			$this->eventsTemplatePath = base_path('app/Classes/Generator/Backend/Events/Templates');

			$this->excelTemplatePath = base_path('app/Classes/Generator/Backend/Excel/Templates');

			$this->exportTemplatePath = base_path('app/Classes/Generator/Backend/Export/Templates');

			$this->filtersTemplatePath = base_path('app/Classes/Generator/Backend/Filters/Templates');

			$this->migrationTemplatePath = base_path('app/Classes/Generator/Backend/Migration/Templates');

			$this->factoryTemplatePath = base_path('app/Classes/Generator/Backend/Factory/Templates');

			$this->modelTemplatePath = base_path('app/Classes/Generator/Backend/Model/Templates');

			$this->modelTraitsTemplatePath = base_path('app/Classes/Generator/Backend/ModelTraits/Templates');

			$this->notificationTemplatePath = base_path('app/Classes/Generator/Backend/Notification/Templates');

			$this->policyTemplatePath = base_path('app/Classes/Generator/Backend/Policy/Templates');

			$this->requestsTemplatePath = base_path('app/Classes/Generator/Backend/Requests/Templates');

			$this->resourceTemplatePath = base_path('app/Classes/Generator/Backend/Resource/Templates');

			$this->routeTemplatePath = base_path('app/Classes/Generator/Backend/Route/Templates');

			$this->testTemplatePath = base_path('app/Classes/Generator/Backend/Test/Templates');

			$this->registerTemplatePath = base_path('app/Classes/Generator/Backend/Register/Templates');

			///////////////////////////////////////////////////////////////////////////////////////////////////

			$this->adminRouteTemplatePath = base_path('app/Classes/Generator/Frontend/AdminRoute/Templates');

			$this->adminViewTemplatePath = base_path('app/Classes/Generator/Frontend/AdminView/Templates');

			$this->createFormTemplatePath = base_path('app/Classes/Generator/Frontend/CreateForm/Templates');

			$this->createViewTemplatePath = base_path('app/Classes/Generator/Frontend/CreateView/Templates');

			$this->crudTemplatePath = base_path('app/Classes/Generator/Frontend/Crud/Templates');

			$this->editFormTemplatePath = base_path('app/Classes/Generator/Frontend/EditForm/Templates');

			$this->editViewTemplatePath = base_path('app/Classes/Generator/Frontend/EditView/Templates');

			$this->filterFormTemplatePath = base_path('app/Classes/Generator/Frontend/FilterForm/Templates');

			$this->jsModelTemplatePath = base_path('app/Classes/Generator/Frontend/JsModel/Templates');	

			$this->showViewTemplatePath = base_path('app/Classes/Generator/Frontend/ShowView/Templates');	

		}

	// Operación para reemplazar la información de muestra

		protected function replaceData($file)
		{

			$content = file_get_contents($file);

			// EL ORDEN DE REEMPLAZO SI IMPORTA

			// PRIMERO LOS PLUARALES
			 
			$content = str_replace("pluralModelName", $this->pluralModelName, $content);

        	$content = str_replace("plural_snake_case_model_name", $this->plural_snake_case_model_name, $content);

        	$content = str_replace("pluralCamelCaseModelName", $this->pluralCamelCaseModelName, $content);

        	$content = str_replace("PluralPascalCaseModelName", $this->PluralPascalCaseModelName, $content);

        	$content = str_replace("pluralkebabcasemodelname", $this->pluralkebabcasemodelname, $content);

        	$content = str_replace("pluralDotModelName", $this->pluralDotModelName, $content);

        	// EN SEGUNDO LUGAR LOS SINGULARES

        	$content = str_replace("snake_case_model_name", $this->snake_case_model_name, $content);

        	$content = str_replace("camelCaseModelName", $this->camelCaseModelName, $content);

        	$content = str_replace("PascalCaseModelName", $this->PascalCaseModelName, $content);

        	$content = str_replace("kebabcasemodelname", $this->kebabcasemodelname, $content);

        	$content = str_replace("dotModelName", $this->dotModelName, $content);

        	$content = str_replace("ModelName", $this->ModelName, $content);

        	// AL FINAL EL NOMBRE DE MODELO. (ESTE PUEDE QUE NO SE NECESITE)

        	file_put_contents($file, $content);
			
		}

}