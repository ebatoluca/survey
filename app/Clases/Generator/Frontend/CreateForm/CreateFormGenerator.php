<?php

namespace App\Classes\Generator\Frontend\CreateForm;

use App\Classes\Generator\AutoGenerator;

class CreateFormGenerator extends AutoGenerator
{

	protected $createFormFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setFilename();

		$this->createBaseDirs();

		$this->createFile();

	}

	protected function setFilename()
	{

		$this->createFormFilename = 'CreateForm.vue';

	}

	protected function createBaseDirs()
	{

		$path = $this->modelFormPath . '/' . $this->snake_case_model_name;

		if (!file_exists($path)) mkdir($path, 0777, true);

	}

	protected function createFile()
	{

		$createFormFile = $this->modelFormPath . '/' . $this->snake_case_model_name . '/' . $this->createFormFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($createFormFile)) {

			$templateFile = $this->createFormTemplatePath . '/CreateFormTemplate.txt';

			if(copy($templateFile, $createFormFile)) {

				// Remplace dummy data
				$this->replaceData($createFormFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}