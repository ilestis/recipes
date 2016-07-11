@extends('layouts.app')

@section('content')


<div class="panel-body">
    <h1>New Season</h1>
    @include('common.flashs')

            <!-- New Task Form -->
    <form action="{{ url('season') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Season Name</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="season-name" class="form-control">
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Season
                </button>
            </div>
        </div>
    </form>
</div>

<!-- TODO: Current Tasks -->
@endsection