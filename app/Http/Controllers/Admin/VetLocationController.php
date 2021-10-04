<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VetLocation;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VetLocationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vet_location_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vet-location.index');
    }

    public function create()
    {
        abort_if(Gate::denies('vet_location_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vet-location.create');
    }

    public function edit(VetLocation $vetLocation)
    {
        abort_if(Gate::denies('vet_location_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vet-location.edit', compact('vetLocation'));
    }

    public function show(VetLocation $vetLocation)
    {
        abort_if(Gate::denies('vet_location_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vet-location.show', compact('vetLocation'));
    }
}
