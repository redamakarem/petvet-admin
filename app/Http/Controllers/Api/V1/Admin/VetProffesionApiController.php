<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVetProffesionRequest;
use App\Http\Requests\UpdateVetProffesionRequest;
use App\Http\Resources\Admin\VetProffesionResource;
use App\Models\VetProffesion;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VetProffesionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vet_proffesion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VetProffesionResource(VetProffesion::all());
    }

    public function store(StoreVetProffesionRequest $request)
    {
        $vetProffesion = VetProffesion::create($request->validated());

        return (new VetProffesionResource($vetProffesion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VetProffesion $vetProffesion)
    {
        abort_if(Gate::denies('vet_proffesion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VetProffesionResource($vetProffesion);
    }

    public function update(UpdateVetProffesionRequest $request, VetProffesion $vetProffesion)
    {
        $vetProffesion->update($request->validated());

        return (new VetProffesionResource($vetProffesion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VetProffesion $vetProffesion)
    {
        abort_if(Gate::denies('vet_proffesion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vetProffesion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
