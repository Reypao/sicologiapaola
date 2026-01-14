// scripts/edit-taller.js
document.addEventListener("DOMContentLoaded", () => {
  const modal = new bootstrap.Modal(document.getElementById("modalEditarTaller"));

  document.querySelectorAll(".btn-editar-taller").forEach(btn => {
    btn.addEventListener("click", () => {
      document.getElementById("taller-id").value = btn.dataset.id;
      document.getElementById("taller-titulo").value = btn.dataset.titulo;
      document.getElementById("taller-descripcion").value = btn.dataset.descripcion;
      document.getElementById("taller-fecha").value = btn.dataset.fecha;
      document.getElementById("taller-hora").value = btn.dataset.hora;
      document.getElementById("taller-modalidad").value = btn.dataset.modalidad;
      document.getElementById("taller-lugar").value = btn.dataset.lugar;
      document.getElementById("taller-cupo").value = btn.dataset.cupo;
      document.getElementById("taller-estado").value = btn.dataset.estado;

      modal.show();
    });
  });
});
