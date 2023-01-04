<?php

namespace App\Http\Events\Classroom\Listeners\CreateEvent;

use App\Models\Log;
use App\Http\Events\Classroom\Events\CreateEvent;
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

        $key = 'ClassroomController.create';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('ClassroomController.create');

        return $message;

    }

}
