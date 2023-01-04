<?php

namespace App\Classes\Generator\Frontend\JsModel;

use App\Classes\Generator\AutoGenerator;

class JsModelGenerator extends AutoGenerator
{

	protected $jsModelFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setFilename();

		$this->createFile();

	}

	protected function setFilename()
	{

		$this->jsModelFilename = $this->snake_case_model_name . '.js';

	}

	protected function createFile()
	{

		$jsModelFile = $this->jsModelPath . '/' . $this->jsModelFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($jsModelFile)) {

			$templateFile = $this->jsModelTemplatePath . '/JsModelTemplate.txt';

			if(copy($templateFile, $jsModelFile)) {

				// Remplace dummy data
				$this->replaceData($jsModelFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}