/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                'primary': '#0F172A',
                'secondary': '#1E293B',
            }
        }
    },
    plugins: [],
}

