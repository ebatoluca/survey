<?php

namespace App\Http\Events\Period\Listeners\RestoreEvent;

use App\Models\Log;
use App\Http\Events\Period\Events\RestoreEvent;
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

        $key = 'PeriodController.restore';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('PeriodController.restore');

        return $message;

    }

}
