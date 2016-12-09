@extends('app')

@section('content')
    <h2>Projecten</h2>

    @if (! $projects->count() )
        Geen projecten aanwezig
    @else
        <ul>
            @foreach( $projects as $project )
                <li>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('projects.destroy', $project->slug))) !!}
                        <a href="{{ route('projects.show', $project->slug) }}">{{$project->name}}</a>
                        (
                            {!! link_to_route('projects.edit', 'Aanpassen', [$project->slug], ['class' => 'btn btn-info']) !!},
                            {!! Form::submit('Verwijderen', ['class' => 'btn btn-danger']) !!}
                        )
                    {!! Form::close() !!}
                </li>
            @endforeach
        </ul>
    @endif

    <p>
        {!! link_to_route('projects.create', 'Aanmaken project') !!}
    </p>
@endsection