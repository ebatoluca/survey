<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Resources\Models\CourseResource;
use App\Classes\Search\SearchBuilder;
use App\Http\Requests\Course\PoliciesRequest;
use App\Http\Requests\Course\PolicyRequest;
use App\Http\Requests\Course\IndexRequest;
use App\Http\Requests\Course\ShowRequest;
use App\Http\Requests\Course\CreateRequest;
use App\Http\Requests\Course\UpdateRequest;
use App\Http\Requests\Course\DeleteRequest;
use App\Http\Requests\Course\RestoreRequest;
use App\Http\Requests\Course\ForceDeleteRequest;
use App\Http\Requests\Course\ExportRequest;
use App\Http\Events\Course\Events\CreateEvent;
use App\Http\Events\Course\Events\DeleteEvent;
use App\Http\Events\Course\Events\ExportEvent;
use App\Http\Events\Course\Events\ForceDeleteEvent;
use App\Http\Events\Course\Events\RestoreEvent;
use App\Http\Events\Course\Events\UpdateEvent;

class CourseController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth:sanctum');

    }

    public function policies(PoliciesRequest $request)
    {

        $course = ($request->id) ? 
            Course::findOrFail($request->id) : 
            app(Course::class);

        return response()->json([
            'index'          => user()->can('index', $course),
            'view'           => user()->can('view', $course),
            'viewAny'        => user()->can('viewAny', $course),
            'create'         => user()->can('create', $course),
            'update'         => user()->can('update', $course),
            'delete'         => user()->can('delete', $course),
            'restore'        => user()->can('restore', $course),
            'forceDelete'    => user()->can('forceDelete', $course),
            'export'         => user()->can('export', $course),
        ]);

    }

    public function policy(PolicyRequest $request)
    {

        $course = ($request->id) ? 
            Course::findOrFail($request->id) : 
            app(Course::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $course),
        ]);

    }

    public function index(IndexRequest $request)
    {

        $builder = new SearchBuilder('Course', $request);

        $query = $builder->get();

        return CourseResource::collection($query);

    }

    public function show(ShowRequest $request)
    {

        $course = Course::where('id', $request->course_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new CourseResource($course);

    }

    public function create(CreateRequest $request)
    {

        $course = (new Course)->createModel($request);

        $response = new CourseResource($course);

        event(new CreateEvent($course, $request, $response));

        return $response;

    }

    public function update(UpdateRequest $request)
    {

        $course = Course::findOrFail($request->course_id);

        $course = $course->updateModel($request);

        $response = new CourseResource($course);

        event(new UpdateEvent($course, $request, $response));

        return $response;

    }

    public function delete(DeleteRequest $request)
    {

        $course = Course::findOrFail($request->course_id);

        $course->deleteModel();

        $response = new CourseResource($course);

        event(new DeleteEvent($course, $request, $response));

        return $response;

    }

    public function restore(RestoreRequest $request)
    {

        $course = Course::withTrashed()->findOrFail($request->course_id);

        $course->restoreModel();

        $response = new CourseResource($course);

        event(new RestoreEvent($course, $request, $response));

        return $response;

    }

    public function forceDelete(ForceDeleteRequest $request)
    {

        $course = Course::withTrashed()->findOrFail($request->course_id);

        $course->forceDeleteModel();

        $response = new CourseResource($course);

        event(new ForceDeleteEvent($course, $request, $response));

        return $response;

    }

    public function export(ExportRequest $request)
    {

        event(new ExportEvent($request));

        return response()->json(['status' => true]);

    }

}
