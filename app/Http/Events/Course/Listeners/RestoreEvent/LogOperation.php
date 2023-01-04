<?php

namespace App\Http\Events\Course\Listeners\RestoreEvent;

use App\Models\Log;
use App\Http\Events\Course\Events\RestoreEvent;
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

        $key = 'CourseController.restore';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('CourseController.restore');

        return $message;

    }

}
