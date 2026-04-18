@extends('installer::app')

@section('content')
<div class="step-indicator">
    <div class="step completed">1</div>
    <div class="step active">2</div>
    <div class="step">3</div>
</div>

<h4 class="text-center mb-4">Ready to Install</h4>

<p class="text-center text-muted mb-4">Click below to start the installation process</p>

<form class="ajaxform_instant_reload" method="post" action="{{ route('install.verify') }}">
    @csrf
    <input type="hidden" name="purchase_key" value="demo">
    <button type="submit" class="btn btn-primary btn-lg w-100">Start Installation</button>
</form>
@endsection