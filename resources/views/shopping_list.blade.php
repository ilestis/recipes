<h1>Shopping List {{ date('Y-m-d') }}</h1>

@foreach ($plannings as $planning)
    <h2>{{ $planning->day }} : {{ $planning->recipe->name }}
    @if (!$planning->is_lunch)
        (Evening)
    @endif</h2>
    <blockquote>
        {!! nl2br($planning->recipe->ingredients) !!}
    </blockquote>
@endforeach
