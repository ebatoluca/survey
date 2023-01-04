<?php

namespace App\Classes\Generator\Frontend\EditForm;

use App\Classes\Generator\AutoGenerator;

class EditFormGenerator extends AutoGenerator
{

	protected $editFormFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setFilename();

		$this->createBaseDirs();

		$this->createFile();

	}

	protected function setFilename()
	{

		$this->editFormFilename = 'EditForm.vue';

	}

	protected function createBaseDirs()
	{

		$path = $this->modelFormPath . '/' . $this->snake_case_model_name;

		if (!file_exists($path)) mkdir($path, 0777, true);

	}

	protected function createFile()
	{

		$editFormFile = $this->modelFormPath . '/' . $this->snake_case_model_name . '/' . $this->editFormFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($editFormFile)) {

			$templateFile = $this->editFormTemplatePath . '/EditFormTemplate.txt';

			if(copy($templateFile, $editFormFile)) {

				// Remplace dummy data
				$this->replaceData($editFormFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}