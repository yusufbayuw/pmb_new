import preset from "./vendor/filament/support/tailwind.config.preset";

export default {
    presets: [preset],
    content: [
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./resources/views/livewire/**/*.blade.php",
    ],
    theme: {
        extends: {
            keyframes: {
                typing: {
                  '0%': { width: '0ch' },
                  '100%': { width: '30ch' }, // adjust the character length (30ch) as per your text
                },
                blink: {
                  '0%, 100%': { borderColor: 'transparent' },
                  '50%': { borderColor: 'black' }, // adjust border color if needed
                }
              },
              animation: {
                typing: 'typing 4s steps(30) 1s infinite normal both, blink .75s step-end infinite',
              },
        },
    },
};
