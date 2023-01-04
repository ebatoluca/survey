<?php

namespace App\Models\Traits\Operations;

trait SurveyQuestionOperations
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
