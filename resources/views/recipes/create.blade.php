@extends('layouts.app')

@include('layouts.header', ['title' => 'Create a Recipe'])

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
                <div class="col-lg-12 text-center">
                    {{ link_to('recipe', trans('recipes.actions.back'), ['class' => 'btn btn-default']) }}
                </div>
            </div>
        </div>
    </section>
@endsection