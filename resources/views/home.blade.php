@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    {{ link_to('generate', 'Generate Planning', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        </div>
    </div>
</div>



<div class="panel panel-default">
    <div class="panel-heading">
        Planning
    </div>
    <div class="panel-body">
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
                            <a href="{{ route('planning.edit', ['id' => $planning->id]) }}" class="btn btn-primary pull-right">
                                <i class="fa fa-btn fa-pencil"></i>Edit
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
</div>
@endsection
