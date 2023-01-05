<?php

namespace App\Models\Traits\Storage;

trait UserStorage
{

    public function createModel($request)
    {

        $user = $this->create($request->only($this->creatable));

        $user->updateModelMetas($request);

        return $user;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        $this->updateModelMetas($request);

        return $this;

    }

    public function updateModelMetas($request)
    {

        $this->update_metas($request, 'UserMeta', 'user_id')->updatePayload();

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