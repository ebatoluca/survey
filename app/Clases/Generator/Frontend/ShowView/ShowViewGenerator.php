<?php

namespace App\Classes\Generator\Frontend\ShowView;

use App\Classes\Generator\AutoGenerator;

class ShowViewGenerator extends AutoGenerator
{

	protected $showViewFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setFilename();

		$this->createBaseDirs();

		$this->createFile();

	}

	protected function setFilename()
	{

		$this->showViewFilename = 'Show' . $this->PascalCaseModelName . '.vue';

	}

	protected function createBaseDirs()
	{

		$path = $this->adminViewPath . '/' . $this->snake_case_model_name;

		if (!file_exists($path)) mkdir($path, 0777, true);

	}

	protected function createFile()
	{

		$showViewFile = $this->adminViewPath . '/' . $this->snake_case_model_name . '/' . $this->showViewFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($showViewFile)) {

			$templateFile = $this->showViewTemplatePath . '/ShowViewTemplate.txt';

			if(copy($templateFile, $showViewFile)) {

				// Remplace dummy data
				$this->replaceData($showViewFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}