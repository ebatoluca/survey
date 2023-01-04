<?php

namespace App\Models\Traits\Storage;

trait ClassroomStorage
{

    public function createModel($request)
    {

        $classroom = $this->create($request->only($this->creatable));

        return $classroom;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    public function updateModelMetas($request)
    {

        $this->update_metas($request, 'ClassroomMeta', 'classroom_id')->updatePayload();

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