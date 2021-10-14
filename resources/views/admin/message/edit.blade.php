@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.message.title_singular') }}:
                    {{ trans('cruds.message.fields.id') }}
                    {{ $message->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('message.edit', [$message])
        </div>
    </div>
</div>
@endsection