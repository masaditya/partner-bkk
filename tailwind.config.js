/** @type {import('tailwindcss').Config} */
export default {
    darkMode:'false',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require("preline/plugin"),
        require("@tailwindcss/forms"),
    ],
};

