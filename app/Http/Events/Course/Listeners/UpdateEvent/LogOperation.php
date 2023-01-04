<?php

namespace App\Http\Events\Course\Listeners\UpdateEvent;

use App\Models\Log;
use App\Http\Events\Course\Events\UpdateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogOperation
{
    
    public function __construct()
    {
        //
    }

    public function handle(UpdateEvent $event)
    {

        $request = $event->request;

        $key = 'CourseController.update';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('CourseController.update');

        return $message;

    }

}
