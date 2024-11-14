document.addEventListener("DOMContentLoaded", function () {
  // Seleccionamos el botón de refrescar por su id
  const refreshButton = document.getElementById("refreshButton");

  // Añadimos un evento de clic
  refreshButton.addEventListener("click", function () {
    // Recargamos la página cuando se hace clic en el botón de refrescar
    location.reload();
  });
});
