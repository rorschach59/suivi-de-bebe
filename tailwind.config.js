/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            colors: {
                "myGreen-200": "#E0FDF5",
                "myGreen-400": "#B2FBE7",
                "myPink-600": "#FF81A7",
                "myPink-800": "#FF3572",
                "myGray-400": "#DFDFDF",
                "myGray-300": "#EAEAEA",
            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
