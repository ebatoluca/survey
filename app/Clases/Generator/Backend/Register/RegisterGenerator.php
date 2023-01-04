<?php

namespace App\Classes\Generator\Backend\Register;

use App\Classes\Generator\AutoGenerator;

class RegisterGenerator extends AutoGenerator
{

	protected $registerFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setRegisterFilename();

		$this->createRegisterFile();

	}

	protected function setRegisterFilename()
	{

		$this->registerFilename = $this->PascalCaseModelName . 'Register.txt';

	}

	protected function createRegisterFile()
	{

		$registerFile = $this->registerPath . '/' . $this->registerFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($registerFile)) {

			$templateFile = $this->registerTemplatePath . '/RegisterTemplate.txt';

			if(copy($templateFile, $registerFile)) {

				// Remplace dummy data
				$this->replaceData($registerFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}