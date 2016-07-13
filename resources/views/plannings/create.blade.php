@extends('layouts.app')

@include('layouts.header', ['title' => 'Create a Planning'])

@section('content')
    <div class="panel-body">
        <section id="planningCreate">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @include('common.flashs')

                        {!! Form::open(['route' => 'planning.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                            @include('plannings.form')
                        {!! Form::close() !!}
                    </div>
                    <div class="col-lg-12 text-center">
                        {{ link_to('home', trans('plannings.actions.back'), ['class' => 'btn btn-default']) }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection