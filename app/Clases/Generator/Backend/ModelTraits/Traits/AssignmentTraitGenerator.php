<?php

namespace App\Classes\Generator\Backend\ModelTraits\Traits;

use App\Classes\Generator\Backend\ModelTraits\ModelTraitsGenerator;

class AssignmentTraitGenerator extends ModelTraitsGenerator
{

	protected $assignmentTraitFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setAssignmentTraitFilename();

		$this->createAssignmentTraitFile();

	}

	protected function setAssignmentTraitFilename()
	{

		$this->assignmentTraitFilename = $this->PascalCaseModelName . 'Assignment.php';

	}

	protected function createAssignmentTraitFile()
	{

		$assignmentTraitFile = $this->modelTraitsPath . '/Assignments/' . $this->assignmentTraitFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($assignmentTraitFile)) {

			$templateFile = $this->modelTraitsTemplatePath . '/Assignments/AssignmentTemplate.txt';

			if(copy($templateFile, $assignmentTraitFile)) {

				// Remplace dummy data
				$this->replaceData($assignmentTraitFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}