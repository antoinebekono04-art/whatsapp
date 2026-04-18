<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class InstallerServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->loadRoutesFrom(base_path('routes/installer.php'));
        $this->loadViewsFrom(base_path('resources/views/installer'), 'installer');
    }
}