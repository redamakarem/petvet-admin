<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePettypeRequest;
use App\Http\Requests\UpdatePettypeRequest;
use App\Http\Resources\Admin\PettypeResource;
use App\Models\Pettype;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PettypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pettype_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PettypeResource(Pettype::all());
    }

    public function store(StorePettypeRequest $request)
    {
        $pettype = Pettype::create($request->validated());

        return (new PettypeResource($pettype))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pettype $pettype)
    {
        abort_if(Gate::denies('pettype_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PettypeResource($pettype);
    }

    public function update(UpdatePettypeRequest $request, Pettype $pettype)
    {
        $pettype->update($request->validated());

        return (new PettypeResource($pettype))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pettype $pettype)
    {
        abort_if(Gate::denies('pettype_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pettype->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
