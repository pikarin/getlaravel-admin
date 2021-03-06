@extends('cp.layouts.default')

@section('page-title', __('cp.create').": ".__('cp.role'))

@section('page-header')

    <h1>@lang('cp.create')</h1>

@endsection

@section('content')

    <div class="panel panel-default">

        <div class="panel-body">

            @include('cp.parts.actions', ['controller'=>'CP\RBAC\RoleController'])

        </div>

    </div>

    <form action="{{ action('CP\RBAC\RoleController@store') }}" method="POST">

        {{ csrf_field() }}

        <div class="panel panel-default">

            <div class="panel-body">

                <div class="form-group">
                    <label for="name">@lang('cp.name')</label>
                    <input type="text" id="name" name="name" placeholder="@lang('cp.name')" value="{{ old('name') }}"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="display_name">@lang('cp.display_name')</label>
                    <input type="text" id="display_name" name="display_name" placeholder="@lang('cp.display_name')"
                           value="{{ old('display_name') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">@lang('cp.description')</label>
                    <textarea id="description" name="description" placeholder="@lang('cp.description')"
                              class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="form-group pull-right">
                    <button class="btn btn-primary">@lang('cp.create')</button>
                </div>

            </div>

        </div>

        <div class="panel panel-default">

            <div class="panel-heading">
                @lang('cp.permissions')
            </div>

            <div class="panel-body">

                <div class="form-group">
                    @foreach(\App\Models\RBAC\Permission::all() as $permission)
                        <label><input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                      title="{{ $permission->display_name }}"> {{ $permission->display_name }}
                        </label><br>
                    @endforeach
                </div>

                <div class="form-group pull-right">
                    <button class="btn btn-primary">@lang('cp.create')</button>
                </div>

            </div>

        </div>

    </form>

@endsection