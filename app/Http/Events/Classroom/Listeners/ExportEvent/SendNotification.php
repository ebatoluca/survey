<?php

namespace App\Http\Events\Classroom\Listeners\ExportEvent;

use App\Notifications\Classroom\ExportNotification;
use App\Http\Events\Classroom\Events\ExportEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotification
{

    public function __construct()
    {
        //
    }

    public function handle(ExportEvent $event)
    {

        $event->request->user()->notify((new ExportNotification($event->request))->locale($event->locale));

    }

}