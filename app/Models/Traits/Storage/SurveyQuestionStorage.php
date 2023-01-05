<?php

namespace App\Models\Traits\Storage;

trait SurveyQuestionStorage
{

    public function createModel($request)
    {

        $order = self::where('survey_category_id', $request->survey_category_id)->count();

        $surveyQuestion = $this->create($request->only($this->creatable) + [
            'order' => ++$order
        ]);

        $surveyQuestion->updateModelMetas($request);

        return $surveyQuestion;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        $this->updateModelMetas($request);

        return $this;

    }

    public function updateModelMetas($request)
    {

        $this->update_metas($request, 'SurveyQuestionMeta', 'survey_question_id')->updatePayload();

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