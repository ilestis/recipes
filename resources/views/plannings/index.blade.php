@extends('layouts.app')

@include('layouts.header', ['title' => trans('plannings.title')])

@section('content')

<section id="planning">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>
                    {{ trans('plannings.header') }}
                    {{ link_to('generate', trans('plannings.actions.generate'), ['class' => 'btn btn-primary pull-right']) }}
                </p>

                @include('common.flashs')

            @if (count($plannings) > 0)
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>{{ trans('plannings.fields.recipe_id') }}</th>
                    <th>{{ trans('plannings.fields.day') }}</th>
                    <th>{{ trans('plannings.fields.time') }}</th>
                    <th>&nbsp;</th>
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
                            <td>
                                <a href="{{ route('planning.show', ['id' => $planning->id]) }}" class="btn btn-primary pull-right">
                                    <i class="fa fa-btn fa-eye"></i>{{ trans('plannings.actions.show') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $plannings->render() !!}
            @else
                    <p>You have no planned upcomming meals yet!</p>
            @endif
            </div>
            <div class="col-lg-12 text-center">
                {{ link_to('history', trans('plannings.actions.history'), ['class' => 'btn btn-primary']) }}
            </div>
        </div>
    </div>
</section>
@endsection
