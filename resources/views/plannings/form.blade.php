{{ csrf_field() }}

<div class="form-group">
    {{ Form::label('recipe_id', trans('plannings.fields.recipe_id'), ['class' => 'control-label']) }}
    {{ Form::select('recipe_id', $recipes, null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('day', trans('plannings.fields.day'), ['class' => 'control-label']) }}
    {{ Form::text('day', null, ['class' => 'form-control', 'data-type' => 'datepicker']) }}
</div>

<div class="form-group">
    {{ Form::label('is_lunch', trans('plannings.fields.is_lunch'), ['class' => 'control-label']) }}
    {{ Form::checkbox('is_lunch', '1', null) }}
    <p class="help-block">{{ trans('plannings.helpers.is_lunch') }}</p>

</div>


<div class="form-group">
    {!! Form::submit(trans('plannings.actions.save'), ['class' => 'btn btn-primary btn-block btn-lg sr-button']) !!}
</div>