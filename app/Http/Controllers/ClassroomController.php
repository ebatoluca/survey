<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Http\Resources\Models\ClassroomResource;
use App\Classes\Search\SearchBuilder;
use App\Http\Requests\Classroom\PoliciesRequest;
use App\Http\Requests\Classroom\PolicyRequest;
use App\Http\Requests\Classroom\IndexRequest;
use App\Http\Requests\Classroom\ShowRequest;
use App\Http\Requests\Classroom\CreateRequest;
use App\Http\Requests\Classroom\UpdateRequest;
use App\Http\Requests\Classroom\DeleteRequest;
use App\Http\Requests\Classroom\RestoreRequest;
use App\Http\Requests\Classroom\ForceDeleteRequest;
use App\Http\Requests\Classroom\ExportRequest;
use App\Http\Events\Classroom\Events\CreateEvent;
use App\Http\Events\Classroom\Events\DeleteEvent;
use App\Http\Events\Classroom\Events\ExportEvent;
use App\Http\Events\Classroom\Events\ForceDeleteEvent;
use App\Http\Events\Classroom\Events\RestoreEvent;
use App\Http\Events\Classroom\Events\UpdateEvent;

class ClassroomController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth:sanctum');

    }

    public function policies(PoliciesRequest $request)
    {

        $classroom = ($request->id) ? 
            Classroom::findOrFail($request->id) : 
            app(Classroom::class);

        return response()->json([
            'index'          => user()->can('index', $classroom),
            'view'           => user()->can('view', $classroom),
            'viewAny'        => user()->can('viewAny', $classroom),
            'create'         => user()->can('create', $classroom),
            'update'         => user()->can('update', $classroom),
            'delete'         => user()->can('delete', $classroom),
            'restore'        => user()->can('restore', $classroom),
            'forceDelete'    => user()->can('forceDelete', $classroom),
            'export'         => user()->can('export', $classroom),
        ]);

    }

    public function policy(PolicyRequest $request)
    {

        $classroom = ($request->id) ? 
            Classroom::findOrFail($request->id) : 
            app(Classroom::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $classroom),
        ]);

    }

    public function index(IndexRequest $request)
    {

        $builder = new SearchBuilder('Classroom', $request);

        $query = $builder->get();

        return ClassroomResource::collection($query);

    }

    public function show(ShowRequest $request)
    {

        $classroom = Classroom::where('id', $request->classroom_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new ClassroomResource($classroom);

    }

    public function create(CreateRequest $request)
    {

        $classroom = (new Classroom)->createModel($request);

        $response = new ClassroomResource($classroom);

        event(new CreateEvent($classroom, $request, $response));

        return $response;

    }

    public function update(UpdateRequest $request)
    {

        $classroom = Classroom::findOrFail($request->classroom_id);

        $classroom = $classroom->updateModel($request);

        $response = new ClassroomResource($classroom);

        event(new UpdateEvent($classroom, $request, $response));

        return $response;

    }

    public function delete(DeleteRequest $request)
    {

        $classroom = Classroom::findOrFail($request->classroom_id);

        $classroom->deleteModel();

        $response = new ClassroomResource($classroom);

        event(new DeleteEvent($classroom, $request, $response));

        return $response;

    }

    public function restore(RestoreRequest $request)
    {

        $classroom = Classroom::withTrashed()->findOrFail($request->classroom_id);

        $classroom->restoreModel();

        $response = new ClassroomResource($classroom);

        event(new RestoreEvent($classroom, $request, $response));

        return $response;

    }

    public function forceDelete(ForceDeleteRequest $request)
    {

        $classroom = Classroom::withTrashed()->findOrFail($request->classroom_id);

        $classroom->forceDeleteModel();

        $response = new ClassroomResource($classroom);

        event(new ForceDeleteEvent($classroom, $request, $response));

        return $response;

    }

    public function export(ExportRequest $request)
    {

        event(new ExportEvent($request));

        return response()->json(['status' => true]);

    }

}
