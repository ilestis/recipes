@extends('layouts.app')

@include('layouts.header', ['title' => trans('recipes.titles.index')])

@section('content')
    <section id="recipes">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        {{ trans('recipes.header') }}
                        {{ link_to('recipe/create', 'New Recipe', ['class' => 'btn btn-primary pull-right']) }}
                    </p>

                    @include('common.flashs')

                @if (count($recipes) > 0)
                    <table class="table table-striped task-table">

                        <!-- Table Headings -->
                        <thead>
                            <th>{{ trans('recipes.fields.name') }}</th>
                            <th>{{ trans('recipes.fields.duration') }}</th>
                            <th>{{ trans('recipes.fields.difficulty') }}</th>
                            <th>{{ trans('recipes.fields.frequency') }}</th>
                            <th>&nbsp;</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                        @foreach ($recipes as $recipe)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ link_to_route('recipe.show', $recipe->name, $recipe->id) }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $recipe->duration }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ trans('recipes.values.difficulty.' . $recipe->difficulty) }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ trans('recipes.values.frequency.' . $recipe->frequency) }}</div>
                                </td>
                                <td>
                                    <a href="{{ route('recipe.edit', ['id' => $recipe->id]) }}" class="btn btn-primary pull-right">
                                        <i class="fa fa-btn fa-pencil"></i>{{ trans('recipes.actions.edit') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {!! $recipes->render() !!}

                @endif
                </div>
            </div>
        </div>
    </section>
@endsection