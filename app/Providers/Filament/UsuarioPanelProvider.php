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

class UsuarioPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('usuario')
            ->path('usuario')
            ->login(CustomLoginPage::class)
            ->colors([
                'primary' => "#283F4F",
            ])
            ->viteTheme('resources/css/filament/usuario/theme.css')
            ->discoverResources(in: app_path('Filament/Usuario/Resources'), for: 'App\\Filament\\Usuario\\Resources')
            ->discoverPages(in: app_path('Filament/Usuario/Pages'), for: 'App\\Filament\\Usuario\\Pages')
            ->pages([
                Pages\Dashboard::class,
                \App\Filament\Usuario\Resources\LivroDigitalResource\Pages\BibliotecaDigital::class,
                \App\Filament\Usuario\Resources\LivroFisicoResource\Pages\BibliotecaFisica::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Usuario/Widgets'), for: 'App\\Filament\\Usuario\\Widgets')
            ->widgets([
                \App\Filament\Usuario\Widgets\UserStatsOverView::class,
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
