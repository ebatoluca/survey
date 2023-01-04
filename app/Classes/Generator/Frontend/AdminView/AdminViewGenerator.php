<?php

namespace App\Classes\Generator\Frontend\AdminView;

use App\Classes\Generator\AutoGenerator;

class AdminViewGenerator extends AutoGenerator
{

	protected $adminViewFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setFilename();

		$this->createBaseDirs();

		$this->createFile();

	}

	protected function setFilename()
	{

		$this->adminViewFilename = 'Admin' . $this->PluralPascalCaseModelName . '.vue';

	}

	protected function createBaseDirs()
	{

		$path = $this->adminViewPath . '/' . $this->snake_case_model_name;

		if (!file_exists($path)) mkdir($path, 0777, true);

	}

	protected function createFile()
	{

		$adminViewFile = $this->adminViewPath . '/' . $this->snake_case_model_name . '/' . $this->adminViewFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($adminViewFile)) {

			$templateFile = $this->adminViewTemplatePath . '/AdminViewTemplate.txt';

			if(copy($templateFile, $adminViewFile)) {

				// Remplace dummy data
				$this->replaceData($adminViewFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}