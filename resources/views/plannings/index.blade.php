@extends('layouts.app')

@include('layouts.header', ['title' => trans('plannings.titles.index')])

@section('content')

<section id="planning">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-right">

                {{ link_to('generate', trans('plannings.actions.generate'), ['class' => 'btn btn-primary']) }}
                {{ link_to('shopping_list', trans('plannings.actions.shopping_list'), ['class' => 'btn btn-primary']) }}
            </div>
            <div class="col-lg-12">
                <p>
                    {{ trans('plannings.header') }}
                </p>

                @include('common.flashs')

            @if (count($plannings) > 0)
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>{{ trans('plannings.fields.recipe_id') }}</th>
                        <th>{{ trans('plannings.fields.day') }}</th>
                        <th>{{ trans('plannings.fields.time') }}</th>
                        <th class="text-right">
                            <a href="{{ route('planning.create') }}" class="btn btn-primary">
                                <i class="fa fa-btn fa-plus"></i> {{ trans('plannings.actions.create') }}
                            </a>
                        </th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($plannings as $planning)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ link_to_route('recipe.show', $planning->recipe->name, ['id' => $planning->recipe_id]) }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $planning->getFormattedDay() }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ trans('plannings.values.time.' . $planning->is_lunch) }}</div>
                            </td>
                            <td class="text-right">
                                <a href="{{ route('planning.show', ['id' => $planning->id]) }}" class="btn btn-danger">
                                    <i class="fa fa-btn fa-eye"></i>{{ trans('plannings.actions.show') }}
                                </a>
                                <a href="{{ route('planning.edit', ['id' => $planning->id]) }}" class="btn btn-primary">
                                    <i class="fa fa-btn fa-pencil"></i>{{ trans('plannings.actions.edit') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $plannings->render() !!}
            @else
                    <p>{{ trans('plannings.nothing_planned') }}</p>
            @endif
            </div>
            <div class="col-lg-12 text-center">
                {{ link_to('history', trans('plannings.actions.history'), ['class' => 'btn btn-primary']) }}
            </div>
        </div>
    </div>
</section>
@endsection
