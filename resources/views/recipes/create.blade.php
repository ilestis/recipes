@extends('layouts.app')

@section('content')


<div class="panel-body">
    <h1>New Recipe</h1>

    @include('common.flashs')

    {!! Form::open(['route' => 'recipe.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

        @include('recipes.form')

    {!! Form::close() !!}
</div>

<!-- TODO: Current Tasks -->
@endsection