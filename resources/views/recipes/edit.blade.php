@extends('layouts.app')

@include('layouts.header', ['title' => 'Edit Recipe'])


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
                <div class="col-lg-12 text-center">
                    {{ link_to('recipe', trans('recipes.actions.back'), ['class' => 'btn btn-default']) }}
                </div>
            </div>
        </div>
    </section>
@endsection