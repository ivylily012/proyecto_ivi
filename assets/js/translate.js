function googleTranslateElementInit() {
  new google.translate.TranslateElement(
    {
      pageLanguage: "es",
      includedLanguages: "es,en,de",
      layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
    },
    "google_translate_element"
  );

  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".dropdown-item.idioma").forEach((item) => {
      item.addEventListener("click", function () {
        const lang = this.getAttribute("data-lang");
        const googleFrame = document.querySelector(".goog-te-combo");
        if (googleFrame) {
          googleFrame.value = lang;
          googleFrame.dispatchEvent(new Event("change"));
        }
      });
    });
  });
  
}
