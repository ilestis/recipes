@extends('layouts.app')

@include('layouts.header', ['title' => trans('seasons.titles.index')])

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
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                        @foreach ($seasons as $season)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ link_to_route('season.edit', $season->name, $season->id) }}</div>
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