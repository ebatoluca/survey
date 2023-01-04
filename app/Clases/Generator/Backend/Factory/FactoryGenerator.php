<?php

namespace App\Classes\Generator\Backend\Factory;

use App\Classes\Generator\AutoGenerator;

class FactoryGenerator extends AutoGenerator
{

	protected $factoryFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setFactoryFilename();

		$this->createFactoryFile();

	}

	protected function setFactoryFilename()
	{

		$this->factoryFilename = $this->PascalCaseModelName . 'Factory.php';

	}

	protected function createFactoryFile()
	{

		$factoryFile = $this->factoryPath . '/' . $this->factoryFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($factoryFile)) {

			$templateFile = $this->factoryTemplatePath . '/FactoryTemplate.txt';

			if(copy($templateFile, $factoryFile)) {

				// Remplace dummy data
				$this->replaceData($factoryFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}