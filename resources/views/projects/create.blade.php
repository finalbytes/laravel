@extends('app')

@section('content')
    <h2>Project aanmaken</h2>

    {!! Form::model(new App\Project, ['route' => ['projects.store']]) !!}
        @include('projects.partials/_form', ['submit_text' => 'Project aanmaken'])
    {!! Form::close() !!}
@endsection