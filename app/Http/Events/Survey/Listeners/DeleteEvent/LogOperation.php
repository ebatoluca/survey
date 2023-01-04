<?php

namespace App\Http\Events\Survey\Listeners\DeleteEvent;

use App\Models\Log;
use App\Http\Events\Survey\Events\DeleteEvent;
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

        $key = 'SurveyController.delete';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('SurveyController.delete');

        return $message;

    }

}
