@extends('layouts.app')

@include('layouts.header', ['title' => trans('seasons.titles.create')])

@section('content')
    <section id="seasonCreate">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('common.flashs')

                    {!! Form::open(['route' => 'season.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                        @include('seasons.form')
                    {!! Form::close() !!}
                </div>
                <div class="col-lg-12">
                    {{ link_to(URL::previous(), trans('seasons.actions.back'), ['class' => 'btn btn-default btn-block']) }}
                </div>
            </div>
        </div>
    </section>
@endsection