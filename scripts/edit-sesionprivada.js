document.addEventListener("click", function (e) {

  const fila = e.target.closest(".fila-sesion");
  if (!fila) return;

  document.getElementById("sesion-id").value = fila.dataset.id;
  document.getElementById("sesion-cliente").value = fila.dataset.cliente;
  document.getElementById("sesion-fecha").value = fila.dataset.fecha;
  document.getElementById("sesion-hora").value = fila.dataset.hora;
  document.getElementById("sesion_estado").value = fila.dataset.estado;
  document.getElementById("sesion-comentario").value = fila.dataset.comentario;

  const modal = new bootstrap.Modal(
    document.getElementById("modalEditarSesion")
  );
  modal.show();
});

