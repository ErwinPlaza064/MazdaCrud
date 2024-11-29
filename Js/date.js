const fecha = new Date();
  const fechaFormateada = fecha.toLocaleDateString("es-MX", {
    day: "2-digit",
    month: "2-digit",
    year: "numeric"
  });

  // Mostrar la fecha en el elemento correspondiente
  document.getElementById("fecha").textContent = fechaFormateada;