import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/Usuario/**/*.php',
        './resources/views/filament/usuario/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
