{{ csrf_field() }}

<div class="form-group">
    {!! Form::label('name', 'Recipe Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {{ Form::label('ingredients', 'Ingredients', ['class' => 'control-label']) }}
    {{ Form::textarea('ingredients', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('duration', 'Duration', ['class' => 'control-label']) }}
    {{ Form::time('duration', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('difficulty', 'Difficulty', ['class' => 'control-label']) }}
    {{ Form::select('difficulty', trans('recipes.fields.difficulty'), null, ['class' => 'form-control']) }}
</div>


<div class="form-group">
    {{ Form::label('seasons', 'Seasons', ['class' => 'control-label']) }}
    @foreach ($seasons as $season)
        {{ Form::checkbox('seasons[]', $season->id, null, ['id' => 'seasons_' . $season->id]) }} {{ Form::label('seasons_' . $season->id, trans('seasons.name.' . $season->id)) }}
    @endforeach
</div>


<div class="form-group">
    {!! Form::submit('Save Recipe', ['class' => 'btn btn-primary btn-block']) !!}
</div>