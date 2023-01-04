<?php

namespace App\Classes\Generator\Frontend\CreateView;

use App\Classes\Generator\AutoGenerator;

class CreateViewGenerator extends AutoGenerator
{

	protected $createViewFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setFilename();

		$this->createBaseDirs();

		$this->createFile();

	}

	protected function setFilename()
	{

		$this->createViewFilename = 'Create' . $this->PascalCaseModelName . '.vue';

	}

	protected function createBaseDirs()
	{

		$path = $this->adminViewPath . '/' . $this->snake_case_model_name;

		if (!file_exists($path)) mkdir($path, 0777, true);

	}

	protected function createFile()
	{

		$createViewFile = $this->adminViewPath . '/' . $this->snake_case_model_name . '/' . $this->createViewFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($createViewFile)) {

			$templateFile = $this->createViewTemplatePath . '/CreateViewTemplate.txt';

			if(copy($templateFile, $createViewFile)) {

				// Remplace dummy data
				$this->replaceData($createViewFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}