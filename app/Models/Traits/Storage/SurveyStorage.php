<?php

namespace App\Models\Traits\Storage;

trait SurveyStorage
{

    public function createModel($request)
    {

        $survey = $this->create($request->only($this->creatable));

        return $survey;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    public function updateModelMetas($request)
    {

        $this->update_metas($request, 'SurveyMeta', 'survey_id')->updatePayload();

        return $this;

    }

    public function deleteModel()
    {

        $this->delete();

    }

    public function restoreModel()
    {

        $this->restore();

    }

    public function forceDeleteModel()
    {

        abort(403);

        $this->forceDelete();
        
    }

}