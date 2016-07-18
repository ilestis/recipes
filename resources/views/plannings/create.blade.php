@extends('layouts.app')

@include('layouts.header', ['title' => trans('plannings.titles.create')])

@section('content')
    <section id="planningCreate">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @include('common.flashs')

                    {!! Form::open(['route' => 'planning.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                        @include('plannings.form')
                    {!! Form::close() !!}
                </div>
                <div class="col-lg-12">
                    {{ link_to(URL::previous(), trans('plannings.actions.back'), ['class' => 'btn btn-default btn-block']) }}
                </div>
            </div>
        </div>
    </section>
@endsection