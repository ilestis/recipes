@extends('layouts.app')

@include('layouts.header', ['title' => trans('seasons.titles.edit')])

@section('content')
    <section id="seasonEdit">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('common.flashs')

                    {!! Form::model($season, ['method' => 'PUT', 'route' => ['season.update', $season->id], 'class' => 'form-horizontal']) !!}
                        @include('seasons.form')
                    {!! Form::close() !!}
                </div>
                <div class="col-lg-12">
                    {{ link_to(URL::previous(), trans('recipes.actions.back'), ['class' => 'btn btn-default btn-block']) }}
                </div>
            </div>
        </div>
    </section>
@endsection