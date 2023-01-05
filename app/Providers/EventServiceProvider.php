<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot()
    {

        $this->registerModelEvents();

    }

    private function registerModelEvents() 
    {

        $basePath = app_path('Http/Events');

        $namespace = 'App\Http\Events\\';

        $models = array_diff(scandir($basePath), array('.', '..'));

        foreach($models as $model) {

            $eventsPath = $basePath . '/' . $model . '/' . 'Events';

            $events = array_diff(scandir($eventsPath), array('.', '..'));

            foreach($events as $event) {

                $eventName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $event);

                $listenersPath = $basePath . '/' . $model . '/' . 'Listeners/' . $eventName;

                $listeners = array_diff(scandir($listenersPath), array('.', '..'));

                foreach($listeners as $listener) {

                    $listenerName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $listener);

                    $event = $namespace . $model . '\\Events\\' . $eventName;

                    $listener = $namespace . $model . '\\Listeners\\' . $eventName . '\\' . $listenerName;

                    Event::listen($event, $listener);

                }

            }

        }

    }

    public function shouldDiscoverEvents()
    {
        return false;
    }
    
}
