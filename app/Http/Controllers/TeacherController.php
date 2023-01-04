<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Resources\Models\TeacherResource;
use App\Classes\Search\SearchBuilder;
use App\Http\Requests\Teacher\PoliciesRequest;
use App\Http\Requests\Teacher\PolicyRequest;
use App\Http\Requests\Teacher\IndexRequest;
use App\Http\Requests\Teacher\ShowRequest;
use App\Http\Requests\Teacher\CreateRequest;
use App\Http\Requests\Teacher\UpdateRequest;
use App\Http\Requests\Teacher\DeleteRequest;
use App\Http\Requests\Teacher\RestoreRequest;
use App\Http\Requests\Teacher\ForceDeleteRequest;
use App\Http\Requests\Teacher\ExportRequest;
use App\Http\Events\Teacher\Events\CreateEvent;
use App\Http\Events\Teacher\Events\DeleteEvent;
use App\Http\Events\Teacher\Events\ExportEvent;
use App\Http\Events\Teacher\Events\ForceDeleteEvent;
use App\Http\Events\Teacher\Events\RestoreEvent;
use App\Http\Events\Teacher\Events\UpdateEvent;

class TeacherController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth:sanctum');

    }

    public function policies(PoliciesRequest $request)
    {

        $teacher = ($request->id) ? 
            Teacher::findOrFail($request->id) : 
            app(Teacher::class);

        return response()->json([
            'index'          => user()->can('index', $teacher),
            'view'           => user()->can('view', $teacher),
            'viewAny'        => user()->can('viewAny', $teacher),
            'create'         => user()->can('create', $teacher),
            'update'         => user()->can('update', $teacher),
            'delete'         => user()->can('delete', $teacher),
            'restore'        => user()->can('restore', $teacher),
            'forceDelete'    => user()->can('forceDelete', $teacher),
            'export'         => user()->can('export', $teacher),
        ]);

    }

    public function policy(PolicyRequest $request)
    {

        $teacher = ($request->id) ? 
            Teacher::findOrFail($request->id) : 
            app(Teacher::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $teacher),
        ]);

    }

    public function index(IndexRequest $request)
    {

        $builder = new SearchBuilder('Teacher', $request);

        $query = $builder->get();

        return TeacherResource::collection($query);

    }

    public function show(ShowRequest $request)
    {

        $teacher = Teacher::where('id', $request->teacher_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new TeacherResource($teacher);

    }

    public function create(CreateRequest $request)
    {

        $teacher = (new Teacher)->createModel($request);

        $response = new TeacherResource($teacher);

        event(new CreateEvent($teacher, $request, $response));

        return $response;

    }

    public function update(UpdateRequest $request)
    {

        $teacher = Teacher::findOrFail($request->teacher_id);

        $teacher = $teacher->updateModel($request);

        $response = new TeacherResource($teacher);

        event(new UpdateEvent($teacher, $request, $response));

        return $response;

    }

    public function delete(DeleteRequest $request)
    {

        $teacher = Teacher::findOrFail($request->teacher_id);

        $teacher->deleteModel();

        $response = new TeacherResource($teacher);

        event(new DeleteEvent($teacher, $request, $response));

        return $response;

    }

    public function restore(RestoreRequest $request)
    {

        $teacher = Teacher::withTrashed()->findOrFail($request->teacher_id);

        $teacher->restoreModel();

        $response = new TeacherResource($teacher);

        event(new RestoreEvent($teacher, $request, $response));

        return $response;

    }

    public function forceDelete(ForceDeleteRequest $request)
    {

        $teacher = Teacher::withTrashed()->findOrFail($request->teacher_id);

        $teacher->forceDeleteModel();

        $response = new TeacherResource($teacher);

        event(new ForceDeleteEvent($teacher, $request, $response));

        return $response;

    }

    public function export(ExportRequest $request)
    {

        event(new ExportEvent($request));

        return response()->json(['status' => true]);

    }

}
