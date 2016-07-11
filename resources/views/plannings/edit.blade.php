@extends('layouts.app')

@section('content')


<div class="panel-body">
    <h1>Edit Planning</h1>

    @include('common.flashs')

            <!-- New Task Form -->
    {!! Form::model($planning, ['method' => 'PUT', 'route' => ['planning.update', $planning->id], 'class' => 'form-horizontal']) !!}

        @include('plannings.form')

    {!! Form::close() !!}
</div>

<!-- TODO: Current Tasks -->
@endsection