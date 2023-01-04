<?php

namespace App\Classes\Generator\Backend\Controller;

use App\Classes\Generator\AutoGenerator;

class ControllerGenerator extends AutoGenerator
{

	protected $controllerFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setControllerFilename();

		$this->createControllerFile();

	}

	protected function setControllerFilename()
	{

		$this->controllerFilename = $this->PascalCaseModelName . 'Controller.php';

	}

	protected function createControllerFile()
	{

		$controllerFile = $this->controllerPath . '/' . $this->controllerFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($controllerFile)) {

			$templateFile = $this->controllerTemplatePath . '/ControllerTemplate.txt';

			if(copy($templateFile, $controllerFile)) {

				// Remplace dummy data
				$this->replaceData($controllerFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}