@extends('layouts.app')

@include('layouts.header', ['title' => 'Seasons'])

@section('content')
    <section id="seasons">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        {{ trans('seasons.header') }}
                        {{ link_to('season/create', 'New Season', ['class' => 'btn btn-primary pull-right']) }}
                    </p>

                    @include('common.flashs')

                    @if (count($seasons) > 0)
                    <table class="table table-striped task-table">

                        <!-- Table Headings -->
                        <thead>
                        <th>{{ trans('seasons.fields.name') }}</th>
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

                                        <button type="submit" id="delete-season-{{ $season->id }}" class="btn btn-danger pull-right">
                                            <i class="fa fa-btn fa-trash"></i>{{ trans('seasons.actions.delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection