<?php

namespace App\Http\Events\SurveyAnswer\Listeners\RestoreEvent;

use App\Models\Log;
use App\Http\Events\SurveyAnswer\Events\RestoreEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogOperation
{
    
    public function __construct()
    {
        //
    }

    public function handle(RestoreEvent $event)
    {

        $request = $event->request;

        $key = 'SurveyAnswerController.restore';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('SurveyAnswerController.restore');

        return $message;

    }

}
