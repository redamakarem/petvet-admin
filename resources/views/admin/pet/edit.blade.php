@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.pet.title_singular') }}:
                    {{ trans('cruds.pet.fields.id') }}
                    {{ $pet->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('pet.edit', [$pet])
        </div>
    </div>
</div>
@endsection