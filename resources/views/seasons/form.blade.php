{{ csrf_field() }}

<div class="form-group">
    {!! Form::label('name', trans('seasons.fields.name'), ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit(trans('seasons.actions.save'), ['class' => 'btn btn-primary btn-block btn-lg sr-button']) !!}
</div>