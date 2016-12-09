@extends('app')

@section('content')
    <h2>Project aanpassen</h2>

    {!! Form::model($project, ['method' => 'PATCH', 'route' => ['projects.update', $project->id]]) !!}
    @include('projects/partials/_form', ['submit_text' => 'Aanpassen'])
    {!! Form::close() !!}
@endsection