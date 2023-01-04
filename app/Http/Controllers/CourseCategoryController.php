<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use App\Http\Resources\Models\CourseCategoryResource;
use App\Classes\Search\SearchBuilder;
use App\Http\Requests\CourseCategory\PoliciesRequest;
use App\Http\Requests\CourseCategory\PolicyRequest;
use App\Http\Requests\CourseCategory\IndexRequest;
use App\Http\Requests\CourseCategory\ShowRequest;
use App\Http\Requests\CourseCategory\CreateRequest;
use App\Http\Requests\CourseCategory\UpdateRequest;
use App\Http\Requests\CourseCategory\DeleteRequest;
use App\Http\Requests\CourseCategory\RestoreRequest;
use App\Http\Requests\CourseCategory\ForceDeleteRequest;
use App\Http\Requests\CourseCategory\ExportRequest;
use App\Http\Events\CourseCategory\Events\CreateEvent;
use App\Http\Events\CourseCategory\Events\DeleteEvent;
use App\Http\Events\CourseCategory\Events\ExportEvent;
use App\Http\Events\CourseCategory\Events\ForceDeleteEvent;
use App\Http\Events\CourseCategory\Events\RestoreEvent;
use App\Http\Events\CourseCategory\Events\UpdateEvent;

class CourseCategoryController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth:sanctum');

    }

    public function policies(PoliciesRequest $request)
    {

        $courseCategory = ($request->id) ? 
            CourseCategory::findOrFail($request->id) : 
            app(CourseCategory::class);

        return response()->json([
            'index'          => user()->can('index', $courseCategory),
            'view'           => user()->can('view', $courseCategory),
            'viewAny'        => user()->can('viewAny', $courseCategory),
            'create'         => user()->can('create', $courseCategory),
            'update'         => user()->can('update', $courseCategory),
            'delete'         => user()->can('delete', $courseCategory),
            'restore'        => user()->can('restore', $courseCategory),
            'forceDelete'    => user()->can('forceDelete', $courseCategory),
            'export'         => user()->can('export', $courseCategory),
        ]);

    }

    public function policy(PolicyRequest $request)
    {

        $courseCategory = ($request->id) ? 
            CourseCategory::findOrFail($request->id) : 
            app(CourseCategory::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $courseCategory),
        ]);

    }

    public function index(IndexRequest $request)
    {

        $builder = new SearchBuilder('CourseCategory', $request);

        $query = $builder->get();

        return CourseCategoryResource::collection($query);

    }

    public function show(ShowRequest $request)
    {

        $courseCategory = CourseCategory::where('id', $request->course_category_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new CourseCategoryResource($courseCategory);

    }

    public function create(CreateRequest $request)
    {

        $courseCategory = (new CourseCategory)->createModel($request);

        $response = new CourseCategoryResource($courseCategory);

        event(new CreateEvent($courseCategory, $request, $response));

        return $response;

    }

    public function update(UpdateRequest $request)
    {

        $courseCategory = CourseCategory::findOrFail($request->course_category_id);

        $courseCategory = $courseCategory->updateModel($request);

        $response = new CourseCategoryResource($courseCategory);

        event(new UpdateEvent($courseCategory, $request, $response));

        return $response;

    }

    public function delete(DeleteRequest $request)
    {

        $courseCategory = CourseCategory::findOrFail($request->course_category_id);

        $courseCategory->deleteModel();

        $response = new CourseCategoryResource($courseCategory);

        event(new DeleteEvent($courseCategory, $request, $response));

        return $response;

    }

    public function restore(RestoreRequest $request)
    {

        $courseCategory = CourseCategory::withTrashed()->findOrFail($request->course_category_id);

        $courseCategory->restoreModel();

        $response = new CourseCategoryResource($courseCategory);

        event(new RestoreEvent($courseCategory, $request, $response));

        return $response;

    }

    public function forceDelete(ForceDeleteRequest $request)
    {

        $courseCategory = CourseCategory::withTrashed()->findOrFail($request->course_category_id);

        $courseCategory->forceDeleteModel();

        $response = new CourseCategoryResource($courseCategory);

        event(new ForceDeleteEvent($courseCategory, $request, $response));

        return $response;

    }

    public function export(ExportRequest $request)
    {

        event(new ExportEvent($request));

        return response()->json(['status' => true]);

    }

}
