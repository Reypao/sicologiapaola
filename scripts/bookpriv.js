document.addEventListener("DOMContentLoaded", () => {
  const formContainer = document.getElementById("bookingFormContainer");
  const fechaInput = document.getElementById("fecha");
  const horaInput = document.getElementById("hora");

  // Si no existe el contenedor, no hacemos nada
  if (!formContainer) return;

  // Al hacer click en un horario disponible
  document.querySelectorAll(".pg-slot").forEach(btn => {
    btn.addEventListener("click", (e) => {
      const col = e.target.closest(".pg-col");
      const dia = col.querySelector(".pg-day").textContent.trim();
      const fecha = col.querySelector(".pg-date").textContent.trim();
      const hora = e.target.textContent.trim();

      // Completa los campos del formulario
      fechaInput.value = `${dia} ${fecha}`;
      horaInput.value = hora;

      // Muestra el formulario
      formContainer.style.display = "block";
      formContainer.scrollIntoView({ behavior: "smooth", block: "start" });
    });
  });

  // Envío del formulario con Web3Forms
  const bookingForm = document.getElementById("bookingForm");
  if (bookingForm) {
    bookingForm.addEventListener("submit", async (e) => {
      e.preventDefault();

      const formData = new FormData(bookingForm);
      const submitBtn = bookingForm.querySelector("button[type='submit']");
      submitBtn.disabled = true;
      submitBtn.textContent = "Enviando...";

      try {
        const response = await fetch(bookingForm.action, {
          method: "POST",
          body: formData,
        });
        const result = await response.json();

        if (response.ok) {
          alert("✅ ¡Reserva enviada correctamente! Te contactaremos pronto.");
          bookingForm.reset();
          formContainer.style.display = "none";
        } else {
          alert("❌ Error: " + (result.message || "Intenta nuevamente."));
        }
      } catch {
        alert("⚠️ No se pudo enviar el formulario. Verifica tu conexión.");
      } finally {
        submitBtn.disabled = false;
        submitBtn.textContent = "Confirmar Reserva";
      }
    });
  }
});
