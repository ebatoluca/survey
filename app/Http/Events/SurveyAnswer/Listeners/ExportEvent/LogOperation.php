<?php

namespace App\Http\Events\SurveyAnswer\Listeners\ExportEvent;

use App\Models\Log;
use App\Http\Events\SurveyAnswer\Events\ExportEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogOperation
{
    
    public function __construct()
    {
        //
    }

    public function handle(ExportEvent $event)
    {

        $request = $event->request;

        $key = 'SurveyAnswerController.export';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('SurveyAnswerController.export');

        return $message;

    }

}
