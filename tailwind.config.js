/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            sans: [
                "Inter",
                "Instrument Sans",
                "ui-sans-serif",
                "system-ui",
                "sans-serif",
                "Apple Color Emoji",
                "Segoe UI Emoji",
                "Segoe UI Symbol",
                "Noto Color Emoji",
            ],
        },
        extend: {
            colors: {
                primary: "#222",
                accent: "#00e0d3",
                "accent-dark": "#00bfae",
                "soft-bg": "#f7f8fa",
                "soft-card": "#fff",
                "soft-border": "#e5e7eb",
                "soft-shadow": "rgba(0,0,0,0.04)",
            },
            boxShadow: {
                soft: "0 2px 16px 0 rgba(0,0,0,0.04)",
                card: "0 4px 32px 0 rgba(0,0,0,0.08)",
            },
            borderRadius: {
                xl: "1.25rem",
                "2xl": "2rem",
            },
            transitionProperty: {
                spacing: "margin, padding",
            },
        },
    },
    plugins: [require("./tailwind-animations-plugin")],
};
