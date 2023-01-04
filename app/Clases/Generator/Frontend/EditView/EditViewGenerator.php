<?php

namespace App\Classes\Generator\Frontend\EditView;

use App\Classes\Generator\AutoGenerator;

class EditViewGenerator extends AutoGenerator
{

	protected $editViewFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setFilename();

		$this->createBaseDirs();

		$this->createFile();

	}

	protected function setFilename()
	{

		$this->editViewFilename = 'Edit' . $this->PascalCaseModelName . '.vue';

	}

	protected function createBaseDirs()
	{

		$path = $this->adminViewPath . '/' . $this->snake_case_model_name;

		if (!file_exists($path)) mkdir($path, 0777, true);

	}

	protected function createFile()
	{

		$editViewFile = $this->adminViewPath . '/' . $this->snake_case_model_name . '/' . $this->editViewFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($editViewFile)) {

			$templateFile = $this->editViewTemplatePath . '/EditViewTemplate.txt';

			if(copy($templateFile, $editViewFile)) {

				// Remplace dummy data
				$this->replaceData($editViewFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}