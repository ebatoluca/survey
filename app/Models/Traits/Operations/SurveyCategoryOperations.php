<?php

namespace App\Models\Traits\Operations;

trait SurveyCategoryOperations
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
