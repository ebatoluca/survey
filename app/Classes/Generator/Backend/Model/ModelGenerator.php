<?php

namespace App\Classes\Generator\Backend\Model;

use App\Classes\Generator\AutoGenerator;

class ModelGenerator extends AutoGenerator
{

	protected $modelFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setModelFilename();

		$this->createModelFile();

	}

	protected function setModelFilename()
	{

		$this->modelFilename = $this->PascalCaseModelName . '.php';

	}

	protected function createModelFile()
	{

		$modelFile = $this->modelPath . '/' . $this->modelFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($modelFile)) {

			$templateFile = $this->modelTemplatePath . '/ModelTemplate.txt';

			if(copy($templateFile, $modelFile)) {

				// Remplace dummy data
				$this->replaceData($modelFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}