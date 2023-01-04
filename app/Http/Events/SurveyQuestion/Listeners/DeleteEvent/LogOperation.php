<?php

namespace App\Http\Events\SurveyQuestion\Listeners\DeleteEvent;

use App\Models\Log;
use App\Http\Events\SurveyQuestion\Events\DeleteEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogOperation
{
    
    public function __construct()
    {
        //
    }

    public function handle(DeleteEvent $event)
    {

        $request = $event->request;

        $key = 'SurveyQuestionController.delete';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('SurveyQuestionController.delete');

        return $message;

    }

}
