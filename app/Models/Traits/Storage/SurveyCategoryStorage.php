<?php

namespace App\Models\Traits\Storage;

trait SurveyCategoryStorage
{

    public function createModel($request)
    {

        $order = self::where('survey_id', $request->survey_id)->count();

        $surveyCategory = $this->create($request->only($this->creatable) + [
            'order' => ++$order
        ]);

        return $surveyCategory;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    public function updateModelMetas($request)
    {

        $this->update_metas($request, 'SurveyCategoryMeta', 'survey_category_id')->updatePayload();

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