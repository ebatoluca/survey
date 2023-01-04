<?php

namespace App\Models\Traits\Operations;

trait AttemptOperations
{

    public function buildPayload()
    {

        return [];

    }

    public function updatePayload()
    {

        $this->update(['payload' => $this->buildPayload()]);

        return $this;

    }

}
