// Navbar toggles: mobile menu and mobile submenu toggles
document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("nav-toggle");
    const mobileMenu = document.getElementById("mobile-menu");

    if (toggle && mobileMenu) {
        toggle.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
            mobileMenu.classList.toggle("block");
        });
    }

    // Submenu toggles
    document.querySelectorAll('[data-toggle="submenu"]').forEach((btn) => {
        btn.addEventListener("click", (e) => {
            const target = btn.getAttribute("data-target");
            if (!target) return;
            const el = document.querySelector(target);
            if (!el) return;
            el.classList.toggle("hidden");
        });
    });

    // Theme toggle (simple class toggle on body)
    const themeBtn = document.getElementById("nav-theme-toggle");
    if (themeBtn) {
        themeBtn.addEventListener("click", () => {
            document.documentElement.classList.toggle("dark");
            // swap icon (simple approach)
            const icon = themeBtn.querySelector("i");
            if (icon) {
                if (document.documentElement.classList.contains("dark")) {
                    icon.className = "fas fa-sun";
                } else {
                    icon.className = "fas fa-moon";
                }
            }
        });
    }

    // optional: attach search button action
    const searchBtn = document.getElementById("nav-search-btn");
    if (searchBtn) {
        searchBtn.addEventListener("click", () => {
            // open native search prompt as a quick fallback
            const q = prompt("Cari di situs:");
            if (q) {
                // example: redirect to /search?q=...
                window.location.href = `/search?q=${encodeURIComponent(q)}`;
            }
        });
    }
});
