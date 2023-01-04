<?php

namespace App\Http\Events\SurveyAnswer\Listeners\ExportEvent;

use App\Notifications\SurveyAnswer\ExportNotification;
use App\Http\Events\SurveyAnswer\Events\ExportEvent;
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