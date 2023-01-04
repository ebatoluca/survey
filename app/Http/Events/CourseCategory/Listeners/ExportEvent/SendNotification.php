<?php

namespace App\Http\Events\CourseCategory\Listeners\ExportEvent;

use App\Notifications\CourseCategory\ExportNotification;
use App\Http\Events\CourseCategory\Events\ExportEvent;
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