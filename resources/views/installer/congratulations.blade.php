@extends('installer::app')

@section('content')
<div class="step-indicator">
    <div class="step completed">1</div>
    <div class="step completed">2</div>
    <div class="step completed">3</div>
</div>

<div class="text-center">
    <h2 class="text-success mb-4">Installation Complete!</h2>
    <p class="text-muted mb-4">WhatsML has been successfully installed.</p>
    
    <a href="/" class="btn btn-primary btn-lg">Go to Dashboard</a>
    
    <div class="mt-4 p-3 bg-light rounded">
        <strong>Important:</strong>
        <ul class="text-start">
            <li>Configure your WhatsApp API credentials in admin panel</li>
            <li>Set up payment gateways if needed</li>
            <li>Configure email settings</li>
        </ul>
    </div>
</div>
@endsection