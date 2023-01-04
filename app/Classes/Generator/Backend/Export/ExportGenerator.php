<?php

namespace App\Classes\Generator\Backend\Export;

use App\Classes\Generator\AutoGenerator;

class ExportGenerator extends AutoGenerator
{

	protected $exportFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setExportFilename();

		$this->createExportFile();

	}

	protected function setExportFilename()
	{

		$this->exportFilename = $this->PluralPascalCaseModelName . 'Exports.php';

	}

	protected function createExportFile()
	{

		$exportFile = $this->exportPath . '/' . $this->exportFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($exportFile)) {

			$templateFile = $this->exportTemplatePath . '/ExportTemplate.txt';

			if(copy($templateFile, $exportFile)) {

				// Remplace dummy data
				$this->replaceData($exportFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}