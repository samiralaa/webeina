const translations = {
    en: {
        logo: "home",

    },
    ar: {
        logo: "آلية",

    },
};

function changeLanguage(lang) {
    if (translations[lang]) {
        document.querySelectorAll("[data-lang]").forEach((element) => {
            const key = element.getAttribute("data-lang");
            if (translations[lang][key]) {
                element.textContent = translations[lang][key];
            }
        });

        // Toggle visibility of language buttons
        if (lang === "en") {
            document.getElementById("lang-en").style.display = "none";
            document.getElementById("lang-ar").style.display = "inline-block";
            document.body.style.direction = "ltr";
            document.body.style.textAlign = "left";
        } else if (lang === "ar") {
            document.getElementById("lang-ar").style.display = "none";
            document.getElementById("lang-en").style.display = "inline-block";
            document.body.style.direction = "rtl";
            document.body.style.textAlign = "right";
        }
    } else {
        console.error(Language "${lang}" not supported.);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    changeLanguage("en"); // Default to English
});
