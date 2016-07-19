@extends('layouts.app')

@include('layouts.header', ['title' => trans('seasons.titles.index')])

@section('content')
    <section id="seasons">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        {{ trans('seasons.header') }}
                    </p>

                    @include('common.flashs')

                    @if (count($seasons) > 0)
                    <table class="table table-striped task-table">

                        <!-- Table Headings -->
                        <thead>
                        <th>{{ trans('seasons.fields.name') }}</th>
                        <th class="text-right">
                            <a href="{{ route('season.create') }}" class="btn btn-primary">
                                <i class="fa fa-btn fa-plus"></i> {{ trans('seasons.actions.create') }}
                            </a>
                        </th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                        @foreach ($seasons as $season)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    {{ $season->name }}
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('season.edit', ['id' => $season->id]) }}" class="btn btn-primary">
                                        <i class="fa fa-btn fa-pencil"></i>{{ trans('seasons.actions.edit') }}
                                    </a>
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