@extends('layouts.app')

@section('content')


<div class="panel-body">
    <h1>New Planning</h1>

    @include('common.flashs')

    {!! Form::open(['route' => 'planning.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

        @include('plannings.form')

    {!! Form::close() !!}
</div>

<!-- TODO: Current Tasks -->
@endsection