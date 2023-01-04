<?php

namespace App\Http\Events\SurveyQuestion\Listeners\CreateEvent;

use App\Models\Log;
use App\Http\Events\SurveyQuestion\Events\CreateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogOperation
{
    
    public function __construct()
    {
        //
    }

    public function handle(CreateEvent $event)
    {

        $request = $event->request;

        $key = 'SurveyQuestionController.create';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('SurveyQuestionController.create');

        return $message;

    }

}
