@extends('layouts.app')

@include('layouts.header', ['title' => trans('recipes.titles.view')])

@section('content')

<section id="planning">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                @include('common.flashs')

                <dl class="dl-horizontal">
                    <dt>{{ trans('recipes.fields.name') }}</dt>
                    <dd>{{ $recipe->name }}</dd>

                    <dt>{{ trans('recipes.fields.ingredients') }}</dt>
                    <dd>{!! nl2br(e($recipe->ingredients)) !!}</dd>

                    <dt>{{ trans('recipes.fields.duration') }}</dt>
                    <dd>{{ nl2br($recipe->duration) }}</dd>

                    <dt>{{ trans('recipes.fields.difficulty') }}</dt>
                    <dd>{{ trans('recipes.values.difficulty.' . $recipe->difficulty) }}</dd>

                    <dt>{{ trans('recipes.fields.frequency') }}</dt>
                    <dd>{{ trans('recipes.values.frequency.' . $recipe->frequency) }}</dd>

                    <dt>{{ trans('recipes.fields.seasons') }}</dt>
                    <dd>
                        @foreach ($recipe->seasons as $season)
                            {{ trans('seasons.name.' . $season) }}<br />
                        @endforeach
                    </dd>
                </dl>

            </div>

            <div class="col-lg-4">
                {{ link_to('recipe', trans('recipes.actions.back'), ['class' => 'btn btn-default btn-lg btn-block']) }}
            </div>

            <div class="col-lg-4">
                <a href="{{ route('recipe.edit', ['id' => $recipe->id]) }}" class="btn btn-primary btn-lg btn-block">
                    <i class="fa fa-btn fa-pencil"></i>{{ trans('recipes.actions.edit') }}
                </a>
            </div>

            <div class="col-lg-4">
                <form action="{{ url('recipe/' . $recipe->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" id="delete-recipe-{{ $recipe->id }}" class="btn btn-danger btn-lg btn-block">
                        <i class="fa fa-btn fa-trash"></i>{{ trans('recipes.actions.delete') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
