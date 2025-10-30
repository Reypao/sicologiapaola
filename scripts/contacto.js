document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("contactoForm");

  form.addEventListener("submit", async (e) => {
    e.preventDefault(); // evita recargar la página

    const formData = new FormData(form);

    // Muestra un mensaje mientras se envía
    const submitBtn = form.querySelector("button[type='submit']");
    submitBtn.disabled = true;
    submitBtn.textContent = "Enviando...";

    try {
      const response = await fetch(form.action, {
        method: "POST",
        body: formData,
      });

      const result = await response.json();

      if (response.ok) {
        alert("✅ ¡Gracias! Tu mensaje fue enviado correctamente.");
        form.reset(); // limpia el formulario
      } else {
        alert("❌ Ocurrió un error: " + (result.message || "Intenta nuevamente."));
      }
    } catch (error) {
      alert("❌ No se pudo enviar el formulario. Verifica tu conexión.");
    } finally {
      submitBtn.disabled = false;
      submitBtn.textContent = "Enviar";
    }
  });
});