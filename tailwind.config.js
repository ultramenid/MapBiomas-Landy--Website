/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

export default {
    darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/masmerise/livewire-toaster/resources/views/*.blade.php', // 👈
      ],
  theme: {
    extend: {
        colors: {
            newgray: {
                50: '#f9fafb',
                100: '#f4f5f7',
                200: '#e5e7eb',
                300: '#d5d6d7',
                400: '#9e9e9e',
                500: '#707275',
                600: '#4c4f52',
                700: '#24262d',
                800: '#1a1c23',
                900: '#121317',
              },
            /*
            |--------------------------------------------------------------
            | Semantic design tokens (light / dark) — CMS UI
            |--------------------------------------------------------------
            | Values live as RGB triplets in resources/css/app.css and flip
            | via the `.dark` class on <html>, so opacity modifiers work.
            */
            canvas: 'rgb(var(--canvas) / <alpha-value>)',
            surface: 'rgb(var(--surface) / <alpha-value>)',
            line: 'rgb(var(--line) / <alpha-value>)',
            'line-strong': 'rgb(var(--line-strong) / <alpha-value>)',
            ink: 'rgb(var(--ink) / <alpha-value>)',
            'ink-muted': 'rgb(var(--ink-muted) / <alpha-value>)',
            'ink-subtle': 'rgb(var(--ink-subtle) / <alpha-value>)',
            hover: 'rgb(var(--hover) / <alpha-value>)',
            accent: 'rgb(var(--accent) / <alpha-value>)',
            'accent-hover': 'rgb(var(--accent-hover) / <alpha-value>)',
            'accent-fg': 'rgb(var(--accent-fg) / <alpha-value>)',
            'accent-soft': 'rgb(var(--accent-soft) / <alpha-value>)',
            danger: 'rgb(var(--danger) / <alpha-value>)',
            'danger-hover': 'rgb(var(--danger-hover) / <alpha-value>)',
        },
        fontFamily: {
            'sans': ['Poppins', ...defaultTheme.fontFamily.sans],
        },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}

