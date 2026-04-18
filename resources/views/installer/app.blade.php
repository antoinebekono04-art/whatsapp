<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation - WhatsML</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css">
    <style>
        body { background: #f5f6fa; font-family: 'Segoe UI', sans-serif; }
        .installer-card { max-width: 600px; margin: 50px auto; background: white; border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.1); }
        .installer-header { background: #4f46e5; color: white; padding: 30px; border-radius: 10px 10px 0 0; text-align: center; }
        .installer-body { padding: 40px; }
        .step-indicator { display: flex; justify-content: center; margin-bottom: 30px; }
        .step { width: 35px; height: 35px; border-radius: 50%; background: #ddd; display: flex; align-items: center; justify-content: center; margin: 0 10px; font-weight: bold; }
        .step.active { background: #4f46e5; color: white; }
        .step.completed { background: #10b981; color: white; }
        .extension-check { padding: 8px 15px; border-radius: 5px; margin: 5px 0; }
        .extension-check.pass { background: #d1fae5; color: #065f46; }
        .extension-check.fail { background: #fee2e2; color: #991b1b; }
    </style>
</head>
<body>
    <div class="container">
        <div class="installer-card">
            <div class="installer-header">
                <h2>WhatsML Installation</h2>
                <p>@yield('title')</p>
            </div>
            <div class="installer-body">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>
    @yield('scripts')
</body>
</html>