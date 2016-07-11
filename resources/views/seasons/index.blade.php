@extends('layouts.app')

@section('content')

    <div class="jumbotron">
        <h1>Seasons</h1>

        @include('common.flashs')

        <p>Set up some seasons for all users.</p>

        {{ link_to('season/create', 'New Season', ['class' => 'btn btn-primary']) }}
    </div>

@if (count($seasons) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            Seasons
        </div>

        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- Table Headings -->
                <thead>
                <th>Name</th>
                <th>&nbsp;</th>
                </thead>

                <!-- Table Body -->
                <tbody>
                @foreach ($seasons as $season)
                    <tr>
                        <!-- Task Name -->
                        <td class="table-text">
                            <div>{{ $season->name }}</div>
                        </td>
                        <td>
                            <form action="{{ url('season/' . $season->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" id="delete-season-{{ $season->id }}" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection