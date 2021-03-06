@extends('layouts.app')

@include('layouts.header', ['title' => trans('recipes.titles.create')])

@section('content')
    <section id="planning">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('common.flashs')

                    {!! Form::open(['route' => 'recipe.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                        @include('recipes.form')
                    {!! Form::close() !!}
                </div>
                <div class="col-lg-12">
                    {{ link_to(URL::previous(), trans('recipes.actions.back'), ['class' => 'btn btn-default btn-block']) }}
                </div>
            </div>
        </div>
    </section>
@endsection