<?php

namespace App\Classes\Generator\Backend\Notification;

use App\Classes\Generator\AutoGenerator;

class NotificationGenerator extends AutoGenerator
{

	protected $notificationFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setNotificationFilename();

		$this->createNotificationDir();

		$this->createNotificationFile();

	}

	protected function setNotificationFilename()
	{

		$this->notificationFilename = 'ExportNotification.php';

	}

	protected function createNotificationDir()
	{

		$notificationPath = $this->notificationPath . '/' . $this->PascalCaseModelName;

		if (!file_exists($notificationPath)) mkdir($notificationPath, 0777, true);

	}

	protected function createNotificationFile()
	{

		$notificationFile = $this->notificationPath . '/' . $this->PascalCaseModelName . '/' . $this->notificationFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($notificationFile)) {

			$templateFile = $this->notificationTemplatePath . '/NotificationTemplate.txt';

			if(copy($templateFile, $notificationFile)) {

				// Remplace dummy data
				$this->replaceData($notificationFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}