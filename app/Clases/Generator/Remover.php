<?php 

/*
	
	Se debe remover: 
		
		BACKEND

		* Controller 
		* Events
		* Excel
		* Export
		* Filters
		* Model
		* Model Traits
		* Notifications
		* Policy
		* Registro
		* Request
		* Resource
		* Archivo de ruta
		* Archivo de Test
		* Factory

		FRONTEND

		- JsModel
		- CRUD

	Crear la migración para elimianr la tabla

	Anunciar que se debe desregistrar:
		- Ruta en api/models.php
		- Policy en AuthServiceProvider
		- Eventos en EventService Provider
		- Hacer mención a quitar todas las relaciones hacia dicho modelo

*/

namespace App\Classes\Generator;

use App\Classes\Generator\AutoGenerator;

class Remover extends AutoGenerator {

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

	}

	protected function dropFile(string $file)
	{

		return unlink($file);

	}

	protected function dropDir(string $path)
	{

		$files = glob($path . '/{,.}[!.,!..]*',GLOB_MARK|GLOB_BRACE);
		
		foreach ($files as $file) {
	
			if (is_dir($file)) {
	
				$this->dropDir($file);
	
			} else {
	
				unlink($file);
	
			}
	
		}
	
		return rmdir($path);

	}

	// BACKEND


		public function dropControllerFile()
		{
			$path = $this->controllerPath . '/' . $this->PascalCaseModelName . 'Controller.php';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropEventsDir()
		{
			$path = $this->eventsPath . '/' . $this->PascalCaseModelName;

			return (file_exists($path)) ? $this->dropDir($path) : false;
		}

		public function dropExcelFile()
		{
			$path = $this->excelPath . '/' . $this->snake_case_model_name . '.blade.php';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropExportFile()
		{
			$path = $this->exportPath . '/' . $this->PluralPascalCaseModelName . 'Exports.php';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropFiltersDir()
		{
			$path = $this->filtersPath . '/' . $this->PascalCaseModelName;

			return (file_exists($path)) ? $this->dropDir($path) : false;
		}

		public function dropModelFile()
		{
			$path = $this->modelPath . '/' . $this->PascalCaseModelName . '.php';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropModelAssignmentTraitFile()
		{
			$path = $this->modelTraitsPath . '/Assignments/' . $this->PascalCaseModelName . 'Assignment.php';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropModelMutatorsTraitFile()
		{
			$path = $this->modelTraitsPath . '/Mutators/' . $this->PascalCaseModelName . 'Mutators.php';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropModelOperationsTraitFile()
		{
			$path = $this->modelTraitsPath . '/Operations/' . $this->PascalCaseModelName . 'Operations.php';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropModelQueryTraitFile()
		{
			$path = $this->modelTraitsPath . '/Queries/' . $this->PascalCaseModelName . 'Query.php';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropModelRelationsTraitFile()
		{
			$path = $this->modelTraitsPath . '/Relations/' . $this->PascalCaseModelName . 'Relations.php';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropModelStorageTraitFile()
		{
			$path = $this->modelTraitsPath . '/Storage/' . $this->PascalCaseModelName . 'Storage.php';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropNotificationsDir()
		{
			$path = $this->notificationPath . '/' . $this->PascalCaseModelName;

			return (file_exists($path)) ? $this->dropDir($path) : false;
		}

		public function dropPolicyFile()
		{
			$path = $this->policyPath . '/' . $this->PascalCaseModelName . 'Policy.php';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropRegisterFile()
		{
			$path = $this->registerPath . '/' . $this->PascalCaseModelName . 'Register.txt';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropRequestDir()
		{
			$path = $this->requestPath . '/' . $this->PascalCaseModelName;

			return (file_exists($path)) ? $this->dropDir($path) : false;
		}

		public function dropResourceFile()
		{
			$path = $this->resourcePath . '/' . $this->PascalCaseModelName . 'Resource.php';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropRouteFile()
		{
			$path = $this->apiRoutepath . '/' . $this->snake_case_model_name . '.php';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropTestFile()
		{
			$path = $this->testPath . '/' . $this->PascalCaseModelName . 'EndpointsTest.php';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function createDropMigration()
		{
			$migrationRemover = new \App\Classes\Generator\Backend\Migration\MigrationRemover($this->PascalCaseModelName);

			return true;
		}

		public function dropFactoryFile()
		{
			$path = $this->factoryPath . '/' . $this->PascalCaseModelName . 'Factory.php';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

	// FRONTEND

		public function dropAdminRouteFile()
		{
			$path = $this->adminRoutePath . '/' . $this->snake_case_model_name . '.js';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropAdminViewsDir()
		{
			$path = $this->adminViewPath . '/' . $this->snake_case_model_name;

			return (file_exists($path)) ? $this->dropDir($path) : false;
		}

		public function dropModelFormsDir()
		{
			$path = $this->modelFormPath . '/' . $this->snake_case_model_name;

			return (file_exists($path)) ? $this->dropDir($path) : false;
		}

		public function dropCrudFile()
		{
			$path = $this->crudPath . '/' . $this->PascalCaseModelName . 'Crud.vue';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropFilterFormFile()
		{
			$path = $this->filterFormPath . '/' . $this->PascalCaseModelName . 'FilterForm.vue';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}

		public function dropJsModelFile()
		{
			$path = $this->jsModelPath . '/' . $this->snake_case_model_name . '.js';

			return (file_exists($path)) ? $this->dropFile($path) : false;
		}


	///////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////


	public function all()
	{

		// BACKEND

			$this->dropControllerFile();

			$this->dropEventsDir();

			$this->dropExcelFile();

			$this->dropExportFile();

			$this->dropFiltersDir();

			$this->dropModelFile();

			$this->dropModelAssignmentTraitFile();

			$this->dropModelMutatorsTraitFile();

			$this->dropModelOperationsTraitFile();

			$this->dropModelQueryTraitFile();

			$this->dropModelRelationsTraitFile();

			$this->dropModelStorageTraitFile();

			$this->dropNotificationsDir();

			$this->dropPolicyFile();

			$this->dropRegisterFile();

			$this->dropRequestDir();

			$this->dropResourceFile();

			$this->dropRouteFile();

			$this->dropTestFile();

			$this->createDropMigration();

			$this->dropFactoryFile();

		// FRONTEND

			$this->dropAdminRouteFile();

			$this->dropAdminViewsDir();

			$this->dropModelFormsDir();

			$this->dropCrudFile();

			$this->dropFilterFormFile();

			$this->dropJsModelFile();


	}

}