<div class="form-group">
    {!! Form::label('name', 'Naam:')  !!}
    {!! Form::text('name') !!}
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class' => 'btn primary']) !!}
</div>