/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: 'class',

    theme: {
        extend: {
            gridTemplateColumns: {
                // Complex site-specific column configuration
                'laptop': '15rem auto',
                'footer': '25rem 20rem 20rem'
            },

            gridTemplateRows: {
                'navbar': '4rem auto',
                'dashborad': '10rem auto',
                'category': '20rem auto',
                'main': 'auto',
                

            }
        }
    },
    plugins: [
        require("@tailwindcss/forms")({
            strategy: 'base', // only generate global styles
            strategy: 'class', // only generate classes
          }),
    ],
};
