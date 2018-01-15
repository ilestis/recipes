{{ csrf_field() }}

<div class="form-group">
    {!! Form::label('name', trans('recipes.fields.name'), ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {{ Form::label('ingredients', trans('recipes.fields.ingredients'), ['class' => 'control-label']) }}
    {{ Form::textarea('ingredients', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {!! Form::label('url', trans('recipes.fields.url'), ['class' => 'control-label']) !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {{ Form::label('duration', trans('recipes.fields.duration'), ['class' => 'control-label']) }}
    {{ Form::text('duration', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('difficulty', trans('recipes.fields.difficulty'), ['class' => 'control-label']) }}
    {{ Form::select('difficulty', trans('recipes.values.difficulty'), null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('frequency', trans('recipes.fields.frequency'), ['class' => 'control-label']) }}
    {{ Form::select('frequency', trans('recipes.values.frequency'), null, ['class' => 'form-control']) }}
</div>


<div class="form-group">
    {{ Form::label('seasons', trans('recipes.fields.seasons'), ['class' => 'control-label']) }}
    @foreach ($seasons as $season)
        {{ Form::checkbox('seasons[]', $season->id, null, ['id' => 'seasons_' . $season->id]) }} {{ Form::label('seasons_' . $season->id, trans('seasons.name.' . $season->id)) }}
    @endforeach
</div>


<div class="form-group">
    {!! Form::submit(trans('recipes.actions.save'), ['class' => 'btn btn-primary btn-block btn-lg sr-button']) !!}
</div>