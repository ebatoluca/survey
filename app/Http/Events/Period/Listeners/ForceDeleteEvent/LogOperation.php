<?php

namespace App\Http\Events\Period\Listeners\ForceDeleteEvent;

use App\Models\Log;
use App\Http\Events\Period\Events\ForceDeleteEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogOperation
{
    
    public function __construct()
    {
        //
    }

    public function handle(ForceDeleteEvent $event)
    {

        $request = $event->request;

        $key = 'PeriodController.forceDelete';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('PeriodController.forceDelete');

        return $message;

    }

}
