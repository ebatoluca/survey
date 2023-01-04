<?php

namespace App\Classes\Generator\Backend\Excel;

use App\Classes\Generator\AutoGenerator;

class ExcelGenerator extends AutoGenerator
{

	protected $excelFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setExcelFilename();

		$this->createExcelFile();

	}

	protected function setExcelFilename()
	{

		$this->excelFilename = $this->snake_case_model_name . '.blade.php';

	}

	protected function createExcelFile()
	{

		$excelFile = $this->excelPath . '/' . $this->excelFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($excelFile)) {

			$templateFile = $this->excelTemplatePath . '/ExcelTemplate.txt';

			if(copy($templateFile, $excelFile)) {

				// Remplace dummy data
				$this->replaceData($excelFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}