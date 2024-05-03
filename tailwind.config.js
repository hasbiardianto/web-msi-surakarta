import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: {
        relative: true,
        transform: (content) => content.replace(/taos:/g, ""),
        files: [
            "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
            "./vendor/laravel/jetstream/**/*.blade.php",
            "./storage/framework/views/*.php",
            "./resources/views/**/*.blade.php",
        ],
    },

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        typography,
        require("daisyui"),
        require("tailwindcss-animated"),
        require("taos/plugin"),
    ],
};
