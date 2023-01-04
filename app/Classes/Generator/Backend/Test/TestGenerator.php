<?php

namespace App\Classes\Generator\Backend\Test;

use App\Classes\Generator\AutoGenerator;

class TestGenerator extends AutoGenerator
{

	protected $testFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setTestFilename();

		$this->createTestFile();

	}

	protected function setTestFilename()
	{

		$this->testFilename = $this->PascalCaseModelName . 'EndpointsTest.php';

	}

	protected function createTestFile()
	{

		$testFile = $this->testPath . '/' . $this->testFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($testFile)) {

			$templateFile = $this->testTemplatePath . '/TestTemplate.txt';

			if(copy($templateFile, $testFile)) {

				// Remplace dummy data
				$this->replaceData($testFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}