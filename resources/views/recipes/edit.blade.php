@extends('layouts.app')

@section('content')


<div class="panel-body">
    <h1>Edit Recipe</h1>

    @include('common.flashs')

            <!-- New Task Form -->
    {!! Form::model($recipe, ['method' => 'PUT', 'route' => ['recipe.update', $recipe->id], 'class' => 'form-horizontal']) !!}

        @include('recipes.form')

    {!! Form::close() !!}
</div>

<!-- TODO: Current Tasks -->
@endsection