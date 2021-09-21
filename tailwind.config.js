const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    darkMode: 'media',
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            typography: (theme) => ({
                dark: {
                    css: {
                        color: theme("colors.gray.300"),
                            '[class~="lead"]': { color: theme("colors.gray.400") },
                            a: { color: theme("colors.gray.100") },
                            strong: { color: theme("colors.gray.100") },
                            "ul > li::before": { backgroundColor: theme("colors.gray.700") },
                            hr: { borderColor: theme("colors.gray.800") },
                            blockquote: {
                                color: theme("colors.gray.100"),
                                borderLeftColor: theme("colors.gray.600"),
                            },
                            h1: { color: theme("colors.gray.100") },
                            h2: { color: theme("colors.gray.100") },
                            h3: { color: theme("colors.gray.100") },
                            h4: { color: theme("colors.gray.100") },
                            code: { color: theme("colors.gray.100") },
                            "a code": { color: theme("colors.gray.100") },
                            pre: {
                                color: theme("colors.gray.200"),
                                backgroundColor: theme("colors.gray.800"),
                            },
                            thead: {
                                color: theme("colors.gray.100"),
                                borderBottomColor: theme("colors.gray.700"),
                            },
                            "tbody tr": { borderBottomColor: theme("colors.gray.800") },
                    },
                },
            }),
        },
    },
    variants: {
        typography: ['dark'],
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
