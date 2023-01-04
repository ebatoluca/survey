<?php

namespace App\Classes\Generator\Backend\Migration;

use App\Classes\Generator\AutoGenerator;
use Illuminate\Support\Facades\Schema;

class MigrationGenerator extends AutoGenerator
{

	protected $migrationFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setMigrationFilename();

		$this->createMigrationFile();

	}

	protected function setMigrationFilename()
	{

		$this->migrationFilename = date('Y_m_d_His') . '_create_' . $this->plural_snake_case_model_name . '_table.php';

	}

	protected function createMigrationFile()
	{

		$migrationFile = $this->migrationPath . '/' . $this->migrationFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($migrationFile) && !Schema::hasTable($this->plural_snake_case_model_name)) {

			$templateFile = $this->migrationTemplatePath . '/MigrationTemplate.txt';

			if(copy($templateFile, $migrationFile)) {

				// Remplace dummy data
				$this->replaceData($migrationFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}