<?php

namespace App\Models\Traits\Storage;

trait CourseCategoryStorage
{

    public function createModel($request)
    {

        $courseCategory = $this->create($request->only($this->creatable));

        return $courseCategory;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    public function updateModelMetas($request)
    {

        $this->update_metas($request, 'CourseCategoryMeta', 'course_category_id')->updatePayload();

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