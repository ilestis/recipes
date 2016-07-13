@extends('layouts.app')

@include('layouts.header', ['title' => 'Edit a Planning'])

@section('content')
    <section id="planningEdit">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('common.flashs')

                    {!! Form::model($planning, ['method' => 'PUT', 'route' => ['planning.update', $planning->id], 'class' => 'form-horizontal']) !!}
                        @include('plannings.form')
                    {!! Form::close() !!}
                </div>
                <div class="col-lg-12 text-center">
                    {{ link_to('home', trans('plannings.actions.back'), ['class' => 'btn btn-default']) }}
                </div>
            </div>
        </div>
    </section>
@endsection