<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pettype;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PettypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pettype_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pettype.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pettype_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pettype.create');
    }

    public function edit(Pettype $pettype)
    {
        abort_if(Gate::denies('pettype_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pettype.edit', compact('pettype'));
    }

    public function show(Pettype $pettype)
    {
        abort_if(Gate::denies('pettype_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pettype.show', compact('pettype'));
    }
}
