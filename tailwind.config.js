import preset from './vendor/filament/support/tailwind.config.preset'

module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './app/Filament/**/*.php',
    './vendor/filament/**/*.blade.php',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
