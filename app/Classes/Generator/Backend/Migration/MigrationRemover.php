<?php

namespace App\Classes\Generator\Backend\Migration;

use App\Classes\Generator\AutoGenerator;

class MigrationRemover extends AutoGenerator
{

	protected $migrationFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setMigrationFilename();

		$this->createDropMigrationFile();

	}

	protected function setMigrationFilename()
	{

		$this->migrationFilename = date('Y_m_d_His') . '_drop_' . $this->plural_snake_case_model_name . '_table.php';

	}

	protected function createDropMigrationFile()
	{

		$migrationFile = $this->migrationPath . '/' . $this->migrationFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($migrationFile)) {

			$templateFile = $this->migrationTemplatePath . '/DropTemplate.txt';

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