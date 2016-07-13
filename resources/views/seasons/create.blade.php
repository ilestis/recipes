@extends('layouts.app')

@include('layouts.header', ['title' => 'Create a Season'])

@section('content')
    <section id="seasonCreate">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('common.flashs')

                    {!! Form::open(['route' => 'season.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                     {{ csrf_field() }}


                        <div class="form-group">
                            {!! Form::label('name', trans('seasons.fields.name'), ['class' => 'control-label']) !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit(trans('seasons.actions.save'), ['class' => 'btn btn-primary btn-block sr-button']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-lg-12 text-center">
                    {{ link_to('season', trans('seasons.actions.back'), ['class' => 'btn btn-default']) }}
                </div>
            </div>
        </div>
    </section>
@endsection