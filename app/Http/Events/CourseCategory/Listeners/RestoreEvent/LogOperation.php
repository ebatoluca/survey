<?php

namespace App\Http\Events\CourseCategory\Listeners\RestoreEvent;

use App\Models\Log;
use App\Http\Events\CourseCategory\Events\RestoreEvent;
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

        $key = 'CourseCategoryController.restore';

        $message = $this->getMessage($event);
        
        Log::make($request, $key, $message, true);

    }

    private function getMessage($event) 
    {

        $message = __('CourseCategoryController.restore');

        return $message;

    }

}
