@extends('layouts.app')

@section('content')

    <div class="jumbotron">
        <h1>Recipes</h1>

        @include('common.flashs')

        <p>Your very own recipe list! You can enter as many as you want, so don't be shy.</p>

        {{ link_to('recipe/create', 'New Recipe', ['class' => 'btn btn-primary']) }}
</div>
@if (count($recipes) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            Recipes
        </div>

        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- Table Headings -->
                <thead>
                <th>{{ trans('recipes.fields.name') }}</th>
                <th>{{ trans('recipes.fields.duration') }}</th>
                <th>{{ trans('recipes.fields.difficulty') }}</th>
                <th>{{ trans('recipes.fields.frequency') }}</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                </thead>

                <!-- Table Body -->
                <tbody>
                @foreach ($recipes as $recipe)
                    <tr>
                        <!-- Task Name -->
                        <td class="table-text">
                            <div>{{ $recipe->name }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $recipe->duration }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ trans('recipes.values.difficulty.' . $recipe->difficulty) }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ trans('recipes.values.frequency.' . $recipe->frequency) }}</div>
                        </td>
                        <td>
                            <a href="{{ route('recipe.edit', ['id' => $recipe->id]) }}" class="btn btn-primary pull-right">
                                <i class="fa fa-btn fa-pencil"></i>Edit
                            </a>
                        </td>

                        <td>
                            <form action="{{ url('recipe/' . $recipe->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" id="delete-recipe-{{ $recipe->id }}" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection