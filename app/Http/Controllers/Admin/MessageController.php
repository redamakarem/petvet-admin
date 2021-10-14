<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('message_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.message.index');
    }

    public function create()
    {
        abort_if(Gate::denies('message_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.message.create');
    }

    public function edit(Message $message)
    {
        abort_if(Gate::denies('message_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.message.edit', compact('message'));
    }

    public function show(Message $message)
    {
        abort_if(Gate::denies('message_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $message->load('sender', 'receiver');

        return view('admin.message.show', compact('message'));
    }
}
