<?php

namespace App\Providers;

use App\Filament\MyLogoutResponse;
use Illuminate\Support\ServiceProvider;
use App\Http\Responses\LogoutResponse;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use Illuminate\Database\Eloquent\Model;
use BezhanSalleh\PanelSwitch\PanelSwitch;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(LogoutResponseContract::class, MyLogoutResponse::class);

        Model::unguard();

        PanelSwitch::configureUsing(function (PanelSwitch $panelSwitch) {
            $panelSwitch
                ->simple()
                ->labels([
                    'submonitoring' => 'Submonitoring',
                    'jhpadmin' => 'JHPadmin',
                    'jhp' => 'JHP'
                ])
                ->visible(fn(): bool => auth()->user()->id == 1);
        });

        date_default_timezone_set('Asia/Jakarta');

        // config(['app.locale' => 'id']);
        // Carbon::setLocale('id');
    }
}
