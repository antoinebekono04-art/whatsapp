@extends('installer::app')

@section('content')
<div class="step-indicator">
    <div class="step active">1</div>
    <div class="step">2</div>
    <div class="step">3</div>
</div>

<h4 class="text-center mb-4">System Requirements</h4>

@foreach($extensions as $name => $enabled)
<div class="extension-check {{ $enabled ? 'pass' : 'fail' }}">
    {{ $name }}: {{ $enabled ? 'Enabled' : 'Disabled' }}
</div>
@endforeach

<div class="text-center mt-4">
    <form method="get" action="/install/info">
        <button type="submit" class="btn btn-primary btn-lg">Continue</button>
    </form>
</div>
@endsection