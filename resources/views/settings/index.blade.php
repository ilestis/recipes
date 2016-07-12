@extends('layouts.app')

@section('content')


<div class="panel-body">
    <h1>Settings</h1>

    @include('common.flashs')

    <p>{{ trans('settings.heading') }}</p>

    {!! Form::model($setting, ['route' => 'settings.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
        {{ csrf_field() }}

        @foreach ($days as $day)
            <div class="checkbox">
                <label>
                    {!! Form::checkbox($day, '1', null) !!}
                    {{ trans('settings.fields.' . $day) }}
                </label>
            </div>
        @endforeach

        <p><br /></p>

        <!-- Add Task Button -->
        <div class="form-group">
            {!! Form::submit('Save Settings', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    {!! Form::close() !!}
</div>

@endsection