<?php

namespace App\Http\Events\Period\Listeners\CreateEvent;

use App\Models\Log;
use App\Http\Events\Period\Events\CreateEvent;
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

        $key = 'PeriodController.create';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('PeriodController.create');

        return $message;

    }

}
