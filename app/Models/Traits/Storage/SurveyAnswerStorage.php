<?php

namespace App\Models\Traits\Storage;

trait SurveyAnswerStorage
{

    public function createModel($request)
    {

        $surveyAnswer = $this->create($request->only($this->creatable));

        return $surveyAnswer;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    public function updateModelMetas($request)
    {

        $this->update_metas($request, 'SurveyAnswerMeta', 'survey_answer_id')->updatePayload();

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