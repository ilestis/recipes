{{ csrf_field() }}

<div class="form-group">
    {{ Form::label('recipe_id', trans('plannings.fields.recipe_id'), ['class' => 'control-label']) }}
    {{ Form::select('recipe_id', $recipes, null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('day', trans('plannings.fields.day'), ['class' => 'control-label']) }}
    {{ Form::date('day', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('is_lunch', trans('plannings.fields.is_lunch'), ['class' => 'control-label']) }}
    {{ Form::checkbox('is_lunch', '1', null) }}
</div>


<div class="form-group">
    {!! Form::submit('Save Planning', ['class' => 'btn btn-primary btn-block']) !!}
</div>