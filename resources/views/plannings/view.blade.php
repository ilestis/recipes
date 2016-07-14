@extends('layouts.app')

@include('layouts.header', ['title' => trans('plannings.view.title')])

@section('content')

<section id="planning">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                @include('common.flashs')

                <dl class="dl-horizontal">
                    <dt>{{ trans('recipes.fields.name') }}</dt>
                    <dd>{{ $planning->recipe->name }}</dd>

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
            <div class="col-lg-12">
                {{ link_to('home', trans('plannings.actions.back'), ['class' => 'btn btn-default pull-left']) }}

                <a href="{{ route('planning.edit', ['id' => $planning->id]) }}" class="btn btn-primary pull-right">
                    <i class="fa fa-btn fa-pencil"></i>{{ trans('plannings.actions.edit') }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
