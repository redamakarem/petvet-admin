<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Http\Resources\Admin\TodoResource;
use App\Models\Todo;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('todo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TodoResource(Todo::all());
    }

    public function store(StoreTodoRequest $request)
    {
        $todo = Todo::create($request->validated());

        return (new TodoResource($todo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Todo $todo)
    {
        abort_if(Gate::denies('todo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TodoResource($todo);
    }

    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $todo->update($request->validated());

        return (new TodoResource($todo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Todo $todo)
    {
        abort_if(Gate::denies('todo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $todo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
