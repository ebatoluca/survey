<?php

namespace App\Http\Events\SurveyCategory\Listeners\DeleteEvent;

use App\Models\Log;
use App\Http\Events\SurveyCategory\Events\DeleteEvent;
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

        $key = 'SurveyCategoryController.delete';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('SurveyCategoryController.delete');

        return $message;

    }

}
