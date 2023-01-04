<?php

namespace App\Models\Traits\Operations;

trait CourseCategoryOperations
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
