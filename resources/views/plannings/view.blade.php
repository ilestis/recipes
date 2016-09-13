@extends('layouts.app')

@include('layouts.header', ['title' => trans('plannings.titles.view')])

@section('content')

<section id="planning">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                @include('common.flashs')

                <dl class="dl-horizontal">
                    <dt>{{ trans('recipes.fields.name') }}</dt>
                    <dd>
                        {{ link_to_route('recipe.show', $planning->recipe->name, ['id' => $planning->recipe_id]) }}
                        @if ($planning->recipe->url)
                            , {{ link_to($planning->recipe->url, trans('recipes.fields.url'), ['id' => $planning->recipe_id]) }}
                        @endif
                    </dd>


                    <dt>{{ trans('recipes.fields.ingredients') }}</dt>
                    <dd>{!! nl2br(e($planning->recipe->ingredients)) !!}</dd>

                    <dt>{{ trans('recipes.fields.duration') }}</dt>
                    <dd>{{ nl2br($planning->recipe->duration) }}</dd>

                    <dt>{{ trans('plannings.fields.day') }}</dt>
                    <dd>{{ $planning->day }}</dd>

                    @if ($planning->is_lunch)
                    <dt>{{ trans('plannings.fields.is_lunch') }}</dt>
                    <dd></dd>
                    @endif
                </dl>

            </div>
            <div class="col-lg-4">
                {{ link_to('home', trans('plannings.actions.back'), ['class' => 'btn btn-default btn-lg btn-block']) }}
            </div>

            <div class="col-lg-4">
                <a href="{{ route('planning.edit', ['id' => $planning->id]) }}" class="btn btn-primary btn-lg btn-block">
                    <i class="fa fa-btn fa-pencil"></i>{{ trans('plannings.actions.edit') }}
                </a>
            </div>

            <div class="col-lg-4">
                <form action="{{ url('planning/' . $planning->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" id="delete-planning-{{ $planning->id }}" class="btn btn-danger btn-lg btn-block">
                        <i class="fa fa-btn fa-trash"></i>{{ trans('plannings.actions.delete') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
