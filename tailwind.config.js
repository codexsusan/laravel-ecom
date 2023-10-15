/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            animation: {
                "fade-in": "fadeIn 2s ease-in forwards",
                "fade-out": "fadeOut 2s ease-in forwards",
            },
            keyframes: {
                fadeIn: {
                    from: {
                        opacity: "0",
                    },
                    to: {
                        opacity: "1",
                    },
                },
                fadeOut: {
                    from: {
                        opacity: "1",
                    },
                    to: {
                        opacity: "0",
                    },
                },
            },
            gridTemplateRows: {
                '[auto,auto,1fr]': 'auto auto 1fr',
            },
        },
    },
    plugins: [
        require('flowbite/plugin'),
    ],
};
