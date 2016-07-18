@extends('layouts.app')

@include('layouts.header', ['title' => trans('recipes.titles.edit')])

@section('content')
    <section id="recipeEdit">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('common.flashs')

                    {!! Form::model($recipe, ['method' => 'PUT', 'route' => ['recipe.update', $recipe->id], 'class' => 'form-horizontal']) !!}
                        @include('recipes.form')
                    {!! Form::close() !!}
                </div>
                <div class="col-lg-12">
                    {{ link_to('recipe', trans('recipes.actions.back'), ['class' => 'btn btn-default btn-block']) }}
                </div>
                <div class="col-lg-12">
                    {{ link_to('home', trans('plannings.actions.back'), ['class' => 'btn btn-default btn-block']) }}
                </div>
            </div>
        </div>
    </section>
@endsection