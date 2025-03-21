const plugin = require("tailwindcss/plugin");

module.exports = plugin(function ({ addUtilities }) {
    const animationUtilities = {
        ".animate-float": {
            animation: "float 8s ease-in-out infinite",
        },
        ".animate-float-slow": {
            animation: "float 12s ease-in-out infinite",
        },
        ".animate-float-medium": {
            animation: "float 10s ease-in-out infinite",
        },
        ".animate-rotate": {
            animation: "float-rotate 15s linear infinite",
        },
        "@keyframes float": {
            "0%, 100%": {
                transform: "translateY(0) translateX(0)",
            },
            "50%": {
                transform: "translateY(-20px) translateX(10px)",
            },
        },
        "@keyframes float-rotate": {
            "0%": {
                transform: "translateY(0) rotate(0deg)",
            },
            "50%": {
                transform: "translateY(-15px) rotate(180deg)",
            },
            "100%": {
                transform: "translateY(0) rotate(360deg)",
            },
        },
    };

    addUtilities(animationUtilities);
});
