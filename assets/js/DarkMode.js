document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("darkModeToggle")
    .addEventListener("change", function () {
      if (this.checked) {
        document.body.classList.add("dark-mode");
      } else {
        document.body.classList.remove("dark-mode");
      }
    });

  document
    .getElementById("darkModeToggle")
    .addEventListener("change", function () {
      if (this.checked) {
        document.body.classList.add("dark-mode");
        localStorage.setItem("darkMode", "enabled");
      } else {
        document.body.classList.remove("dark-mode");
        localStorage.setItem("darkMode", "disabled");
      }
    });

  document.addEventListener("DOMContentLoaded", function () {
    if (localStorage.getItem("darkMode") === "enabled") {
      document.body.classList.add("dark-mode");
      document.getElementById("darkModeToggle").checked = true;
    } else {
      document.body.classList.remove("dark-mode");
      document.getElementById("darkModeToggle").checked = false;
    }
  });

  // Retraso en la inicialización del traductor para asegurar que todo esté cargado
  setTimeout(() => {
    googleTranslateElementInit();
  }, 1000);
});

// Cargar el estado del modo oscuro desde localStorage al cargar la página
document.addEventListener("DOMContentLoaded", function () {
  if (localStorage.getItem("darkMode") === "enabled") {
    document.body.classList.add("dark-mode");
    document.getElementById("darkModeToggle").checked = true;
  } else {
    document.body.classList.remove("dark-mode");
    document.getElementById("darkModeToggle").checked = false;
  }

  // Manejar el cambio en el estado del modo oscuro
  document
    .getElementById("darkModeToggle")
    .addEventListener("change", function () {
      if (this.checked) {
        document.body.classList.add("dark-mode");
        localStorage.setItem("darkMode", "enabled");
      } else {
        document.body.classList.remove("dark-mode");
        localStorage.setItem("darkMode", "disabled");
      }
    });
});
