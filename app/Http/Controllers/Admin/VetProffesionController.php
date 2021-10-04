<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VetProffesion;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VetProffesionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vet_proffesion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vet-proffesion.index');
    }

    public function create()
    {
        abort_if(Gate::denies('vet_proffesion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vet-proffesion.create');
    }

    public function edit(VetProffesion $vetProffesion)
    {
        abort_if(Gate::denies('vet_proffesion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vet-proffesion.edit', compact('vetProffesion'));
    }

    public function show(VetProffesion $vetProffesion)
    {
        abort_if(Gate::denies('vet_proffesion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vet-proffesion.show', compact('vetProffesion'));
    }
}
