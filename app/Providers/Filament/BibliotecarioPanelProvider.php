<?php

namespace App\Providers\Filament;

use App\Filament\Login\CustomLoginPage;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class BibliotecarioPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('bibliotecario')
            ->path('bibliotecario')
            ->login(CustomLoginPage::class)
            ->colors([
                'primary' => "#283F4F",
            ])
            ->viteTheme('resources/css/filament/bibliotecario/theme.css')
            ->discoverResources(in: app_path('Filament/Bibliotecario/Resources'), for: 'App\\Filament\\Bibliotecario\\Resources')
            ->discoverPages(in: app_path('Filament/Bibliotecario/Pages'), for: 'App\\Filament\\Bibliotecario\\Pages')
            ->pages([
                Pages\DashboardBibliotecario::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Bibliotecario/Widgets'), for: 'App\\Filament\\Bibliotecario\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
