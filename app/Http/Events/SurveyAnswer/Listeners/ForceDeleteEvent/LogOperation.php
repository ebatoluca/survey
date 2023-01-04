<?php

namespace App\Http\Events\SurveyAnswer\Listeners\ForceDeleteEvent;

use App\Models\Log;
use App\Http\Events\SurveyAnswer\Events\ForceDeleteEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogOperation
{
    
    public function __construct()
    {
        //
    }

    public function handle(ForceDeleteEvent $event)
    {

        $request = $event->request;

        $key = 'SurveyAnswerController.forceDelete';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('SurveyAnswerController.forceDelete');

        return $message;

    }

}
