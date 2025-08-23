<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use App\Filament\Widgets\DashboardStats;

class FilamentServiceProvider extends ServiceProvider
{

public function boot(): void
{
    Filament::registerWidgets([
        DashboardStats::class,
    ]);

    // Restrict panel access
    Filament::serving(function () {
        if (!in_array(auth()->user()?->role, ['admin'])) {
            abort(403);
        }
    });
}

}
