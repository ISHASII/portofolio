// Scroll reveal using IntersectionObserver

(function () {
    if (typeof window === "undefined") return;

    document.addEventListener("DOMContentLoaded", function () {
        // Respect reduced motion
        if (
            window.matchMedia &&
            window.matchMedia("(prefers-reduced-motion: reduce)").matches
        ) {
            document
                .querySelectorAll(".reveal")
                .forEach((el) => el.classList.add("in-view"));
            return;
        }

        const options = {
            root: null,
            rootMargin: "0px 0px -10% 0px",
            threshold: 0.12,
        };

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;

                const el = entry.target;

                // If the element is a stagger container, animate its child .reveal elements with a small delay
                if (el.hasAttribute("data-stagger")) {
                    const children = Array.from(el.querySelectorAll(".reveal"));
                    children.forEach((child, i) => {
                        /* increased stagger between children (220ms step) */
                        child.style.setProperty("--delay", `${i * 220}ms`);
                        child.classList.add("in-view");
                    });
                    obs.unobserve(el);
                    return;
                }

                // Avoid animating elements that are inside a stagger container (they are handled by the container)
                if (el.closest("[data-stagger]")) {
                    obs.unobserve(el);
                    return;
                }

                el.classList.add("in-view");
                obs.unobserve(el);
            });
        }, options);

        // Observe all reveal elements that are not inside a stagger container
        document.querySelectorAll(".reveal").forEach((el) => {
            if (!el.closest("[data-stagger]")) observer.observe(el);
        });

        // Observe stagger containers
        document
            .querySelectorAll("[data-stagger]")
            .forEach((el) => observer.observe(el));
    });
})();
