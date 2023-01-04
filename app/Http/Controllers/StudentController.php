<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Resources\Models\StudentResource;
use App\Classes\Search\SearchBuilder;
use App\Http\Requests\Student\PoliciesRequest;
use App\Http\Requests\Student\PolicyRequest;
use App\Http\Requests\Student\IndexRequest;
use App\Http\Requests\Student\ShowRequest;
use App\Http\Requests\Student\CreateRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Http\Requests\Student\DeleteRequest;
use App\Http\Requests\Student\RestoreRequest;
use App\Http\Requests\Student\ForceDeleteRequest;
use App\Http\Requests\Student\ExportRequest;
use App\Http\Events\Student\Events\CreateEvent;
use App\Http\Events\Student\Events\DeleteEvent;
use App\Http\Events\Student\Events\ExportEvent;
use App\Http\Events\Student\Events\ForceDeleteEvent;
use App\Http\Events\Student\Events\RestoreEvent;
use App\Http\Events\Student\Events\UpdateEvent;

class StudentController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth:sanctum');

    }

    public function policies(PoliciesRequest $request)
    {

        $student = ($request->id) ? 
            Student::findOrFail($request->id) : 
            app(Student::class);

        return response()->json([
            'index'          => user()->can('index', $student),
            'view'           => user()->can('view', $student),
            'viewAny'        => user()->can('viewAny', $student),
            'create'         => user()->can('create', $student),
            'update'         => user()->can('update', $student),
            'delete'         => user()->can('delete', $student),
            'restore'        => user()->can('restore', $student),
            'forceDelete'    => user()->can('forceDelete', $student),
            'export'         => user()->can('export', $student),
        ]);

    }

    public function policy(PolicyRequest $request)
    {

        $student = ($request->id) ? 
            Student::findOrFail($request->id) : 
            app(Student::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $student),
        ]);

    }

    public function index(IndexRequest $request)
    {

        $builder = new SearchBuilder('Student', $request);

        $query = $builder->get();

        return StudentResource::collection($query);

    }

    public function show(ShowRequest $request)
    {

        $student = Student::where('id', $request->student_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new StudentResource($student);

    }

    public function create(CreateRequest $request)
    {

        $student = (new Student)->createModel($request);

        $response = new StudentResource($student);

        event(new CreateEvent($student, $request, $response));

        return $response;

    }

    public function update(UpdateRequest $request)
    {

        $student = Student::findOrFail($request->student_id);

        $student = $student->updateModel($request);

        $response = new StudentResource($student);

        event(new UpdateEvent($student, $request, $response));

        return $response;

    }

    public function delete(DeleteRequest $request)
    {

        $student = Student::findOrFail($request->student_id);

        $student->deleteModel();

        $response = new StudentResource($student);

        event(new DeleteEvent($student, $request, $response));

        return $response;

    }

    public function restore(RestoreRequest $request)
    {

        $student = Student::withTrashed()->findOrFail($request->student_id);

        $student->restoreModel();

        $response = new StudentResource($student);

        event(new RestoreEvent($student, $request, $response));

        return $response;

    }

    public function forceDelete(ForceDeleteRequest $request)
    {

        $student = Student::withTrashed()->findOrFail($request->student_id);

        $student->forceDeleteModel();

        $response = new StudentResource($student);

        event(new ForceDeleteEvent($student, $request, $response));

        return $response;

    }

    public function export(ExportRequest $request)
    {

        event(new ExportEvent($request));

        return response()->json(['status' => true]);

    }

}
