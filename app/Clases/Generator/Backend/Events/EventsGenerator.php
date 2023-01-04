<?php

namespace App\Classes\Generator\Backend\Events;

use App\Classes\Generator\AutoGenerator;

class EventsGenerator extends AutoGenerator
{

	protected $mainEventsPath;

	protected $events = [
		'CreateEvent' => [
			'LogOperation'
		],
		'DeleteEvent' => [
			'LogOperation'
		],
		'ExportEvent' => [
			'LogOperation',
			'SendNotification'
		],
		'ForceDeleteEvent' => [
			'LogOperation'
		],
		'RestoreEvent' => [
			'LogOperation'
		],
		'UpdateEvent' => [
			'LogOperation'
		],
	];

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->createBaseDirs();

		$this->createEventsFiles();

	}

	protected function createBaseDirs()
	{

		// Crear el directorio principal

			// Crear el directorio para almacener eventos y listeners
			// con el nombre del modelo en cuestion en formato PascalCase
			$path = $this->eventsPath . '/' . $this->PascalCaseModelName;

			if (!file_exists($path)) mkdir($path, 0777, true);

			$this->mainEventsPath = $path;

		// Crear los directorios de Events y Listeners

			$eventsPath = $path . '/' . 'Events';

			if (!file_exists($eventsPath)) mkdir($eventsPath, 0777, true);

			$listenersPath = $path . '/' . 'Listeners';

			if (!file_exists($listenersPath)) mkdir($listenersPath, 0777, true);

	}

	protected function createEventsFiles()
	{	

		foreach($this->events as $event => $listeners) {

			// Create Event File
			$this->createEventFile($event);

			foreach($listeners as $listener) {

				$this->createListenerFile($event, $listener);

			}

		}

	}

	protected function createEventFile($eventName)
	{

		$eventFile = $this->mainEventsPath . '/Events/' . $eventName . '.php';

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($eventFile)) {

			$templateFile = $this->eventsTemplatePath . '/Events/' . $eventName . '.txt';

			if(copy($templateFile, $eventFile)) {

				// Remplace dummy data
				$this->replaceData($eventFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

	protected function createListenerFile($eventName, $listenerName)
	{

		// Primero debemos de crear o ver si está creado el directorio para el evento

			$listenerPath = $this->createEventListenerDir($eventName);

		// Después debemos de crear el archivo del listener

			$listenerFile = $listenerPath . '/' . $listenerName . '.php';

			// Solo proceder en caso de los archivos no existan
			if(!file_exists($listenerFile)) {

				$templateFile = $this->eventsTemplatePath . '/Listeners/' . $eventName . '/' . $listenerName . '.txt';

				if(copy($templateFile, $listenerFile)) {

					// Remplace dummy data
					$this->replaceData($listenerFile);

				} else {

					// PENDIENTE: Mandar un mensaje de error

				}

			} else {

				// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

			}

	}

	protected function createEventListenerDir($eventName)
	{

		$path = $this->mainEventsPath . '/Listeners/' . $eventName;

		if (!file_exists($path)) mkdir($path, 0777, true);

		return $path;

	}

}