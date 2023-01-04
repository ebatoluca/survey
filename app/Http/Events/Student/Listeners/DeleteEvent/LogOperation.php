<?php

namespace App\Http\Events\Student\Listeners\DeleteEvent;

use App\Models\Log;
use App\Http\Events\Student\Events\DeleteEvent;
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

        $key = 'StudentController.delete';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('StudentController.delete');

        return $message;

    }

}
