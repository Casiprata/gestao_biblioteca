import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/Bibliotecario/**/*.php',
        './resources/views/filament/bibliotecario/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
