<?php

namespace App\Classes\Generator\Frontend\Crud;

use App\Classes\Generator\AutoGenerator;

class CrudGenerator extends AutoGenerator
{

	protected $crudFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setFilename();

		$this->createFile();

	}

	protected function setFilename()
	{

		$this->crudFilename = $this->PascalCaseModelName . 'Crud.vue';

	}

	protected function createFile()
	{

		$crudFile = $this->crudPath . '/' . $this->crudFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($crudFile)) {

			$templateFile = $this->crudTemplatePath . '/CrudTemplate.txt';

			if(copy($templateFile, $crudFile)) {

				// Remplace dummy data
				$this->replaceData($crudFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}