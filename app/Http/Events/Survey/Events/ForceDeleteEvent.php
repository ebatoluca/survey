<?php

namespace App\Http\Events\Survey\Events;

use App\Models\Survey;
use App\Http\Requests\Survey\ForceDeleteRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ForceDeleteEvent
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $survey;

    public $request;

    public $response;

    public $locale;

    public function __construct(Survey $survey, ForceDeleteRequest $request, $response)
    {
        
        $this->survey = $survey;

        $this->request = $request;

        $this->response = $response;

        $this->locale = ($this->request->hasSession() && 
            $this->request->getSession()->has('locale')) ? $this->request->getSession()->get('locale') : 
            'en';

        App::setLocale($this->locale);

    }

    public function broadcastOn()
    {
        
        return new PrivateChannel('channel-name');

    }

}