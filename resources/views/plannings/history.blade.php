@extends('layouts.app')

@include('layouts.header', ['title' => trans('plannings.history.title')])

@section('content')

<section id="planning">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>
                    {{ trans('plannings.history.header') }}
                </p>

                @include('common.flashs')

            @if (count($plannings) > 0)
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>{{ trans('plannings.fields.recipe_id') }}</th>
                    <th>{{ trans('plannings.fields.day') }}</th>
                    <th>{{ trans('plannings.fields.time') }}</th>
                    @if (!$history)
                        <th>&nbsp;</th>
                    @endif
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($plannings as $planning)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $planning->recipe->name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $planning->getFormattedDay() }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ trans('plannings.values.time.' . $planning->is_lunch) }}</div>
                            </td>
                            @if (!$history)
                            <td>
                                <a href="{{ route('planning.edit', ['id' => $planning->id]) }}" class="btn btn-primary pull-right">
                                    <i class="fa fa-btn fa-pencil"></i>{{ trans('plannings.actions.edit') }}
                                </a>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $plannings->render() !!}
            @else
                    <p>You have no passed plannings.</p>
            @endif

            </div>
            <div class="col-lg-12 text-center">
                {{ link_to('home', trans('plannings.history.actions.back'), ['class' => 'btn btn-primary']) }}
            </div>
        </div>
    </div>
</section>
@endsection
