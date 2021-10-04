<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVetLocationRequest;
use App\Http\Requests\UpdateVetLocationRequest;
use App\Http\Resources\Admin\VetLocationResource;
use App\Models\VetLocation;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VetLocationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vet_location_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VetLocationResource(VetLocation::all());
    }

    public function store(StoreVetLocationRequest $request)
    {
        $vetLocation = VetLocation::create($request->validated());

        return (new VetLocationResource($vetLocation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VetLocation $vetLocation)
    {
        abort_if(Gate::denies('vet_location_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VetLocationResource($vetLocation);
    }

    public function update(UpdateVetLocationRequest $request, VetLocation $vetLocation)
    {
        $vetLocation->update($request->validated());

        return (new VetLocationResource($vetLocation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VetLocation $vetLocation)
    {
        abort_if(Gate::denies('vet_location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vetLocation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
