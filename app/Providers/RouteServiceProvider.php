<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Static_;

final class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for(
            'api',
            Static fn (Request $request): Limit =>
             Limit::perMinute(
                 60)->by(
                     $request->user()?->id ?: $request->ip(),
             )
        );

        $this->routes(function () {
            Route::middleware('api')
                ->as('api:')
                ->group(base_path(
                    'routes/api.php'
                ));
        });
    }
}
