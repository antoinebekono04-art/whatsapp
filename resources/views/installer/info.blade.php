@extends('installer::app')

@section('content')
<div class="step-indicator">
    <div class="step completed">1</div>
    <div class="step completed">2</div>
    <div class="step active">3</div>
</div>

<h4 class="text-center mb-4">Database Configuration</h4>

<form id="install-form" class="ajaxform_instant_reload">
    @csrf
    <div class="mb-3">
        <label class="form-label">Site Name</label>
        <input type="text" name="site_name" class="form-control" value="WhatsML" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Database Host</label>
        <input type="text" name="db_host" class="form-control" value="127.0.0.1" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Database Port</label>
        <input type="number" name="db_port" class="form-control" value="3306" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Database Name</label>
        <input type="text" name="db_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Database Username</label>
        <input type="text" name="db_user" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Database Password</label>
        <input type="password" name="db_pass" class="form-control">
    </div>
    <input type="hidden" name="db_connection" value="mysql">
    <button type="submit" class="btn btn-primary btn-lg w-100">Install Now</button>
</form>
@endsection

@section('scripts')
<script>
document.getElementById('install-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    try {
        const response = await fetch('{{ route("install.store") }}', {
            method: 'POST',
            body: formData
        });
        const data = await response.json();
        if (response.ok) {
            window.location.href = '{{ route("install.verify") }}';
        } else {
            Swal.fire('Error', data.message, 'error');
        }
    } catch (error) {
        Swal.fire('Error', 'Something went wrong', 'error');
    }
});
</script>
@endsection