import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 'resources/js/app.js',
                'resources/css/filament/admin/theme.css',
                'resources/css/filament/bibliotecario/theme.css',
                'resources/css/filament/usuario/theme.css',
            ],
            refresh: true,
        }),
    ],
});
