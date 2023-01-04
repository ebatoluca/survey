<?php

namespace App\Http\Events\Period\Listeners\ExportEvent;

use App\Models\Log;
use App\Http\Events\Period\Events\ExportEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogOperation
{
    
    public function __construct()
    {
        //
    }

    public function handle(ExportEvent $event)
    {

        $request = $event->request;

        $key = 'PeriodController.export';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('PeriodController.export');

        return $message;

    }

}
