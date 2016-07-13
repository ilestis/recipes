@extends('layouts.app')

@include('layouts.header', ['title' => 'Settings'])

@section('content')


<div class="panel-body">
    <section id="setting">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>{{ trans('settings.heading') }}</p>

                    @include('common.flashs')

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
            </div>
        </div>
    </section>
@endsection