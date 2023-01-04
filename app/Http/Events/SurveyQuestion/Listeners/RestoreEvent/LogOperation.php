<?php

namespace App\Http\Events\SurveyQuestion\Listeners\RestoreEvent;

use App\Models\Log;
use App\Http\Events\SurveyQuestion\Events\RestoreEvent;
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

        $key = 'SurveyQuestionController.restore';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('SurveyQuestionController.restore');

        return $message;

    }

}
