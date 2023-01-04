<?php

namespace App\Http\Events\Attempt\Listeners\UpdateEvent;

use App\Models\Log;
use App\Http\Events\Attempt\Events\UpdateEvent;
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

        $key = 'AttemptController.update';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('AttemptController.update');

        return $message;

    }

}
